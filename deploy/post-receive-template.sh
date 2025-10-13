#!/bin/bash
set -e

BRANCH="master"
TARGET="$HOME/jo2024-docker"
GIT_DIR="$HOME/repo.git"
LOG="$GIT_DIR/hooks/deploy.log"
LOG_MAX_SIZE=50000
BACKUP_DIR="$HOME/rollback_jo2024"
MAILTO="mail@clickandgo-informatique.com"

echo "---- deploy started at $(date) ----" >> "$LOG"
echo "PHP version: $(php -v | head -n 1)" >> "$LOG"

# Rotation du log
if [ -f "$LOG" ] && [ $(stat -c%s "$LOG") -gt $LOG_MAX_SIZE ]; then
    mv "$LOG" "$LOG.$(date +%Y%m%d%H%M%S)"
    touch "$LOG"
fi

while read oldrev newrev ref
do
    if [ "$ref" = "refs/heads/$BRANCH" ]; then
        echo "Deploying branch $BRANCH to $TARGET" >> "$LOG"

        mkdir -p "$TARGET"

        # Sauvegarde de l'état actuel
        if [ -d "$TARGET/app" ]; then
            echo "Backing up current app state..." >> "$LOG"
            rm -rf "$BACKUP_DIR"
            cp -r "$TARGET/app" "$BACKUP_DIR"
        fi

        git --work-tree="$TARGET" --git-dir="$GIT_DIR" checkout -f "$BRANCH" >> "$LOG" 2>&1
        git --work-tree="$TARGET" --git-dir="$GIT_DIR" checkout -- . ':!.env.local' ':!.env.prod.local' >> "$LOG" 2>&1 || true

        if [ -f "$TARGET/app/composer.json" ]; then
            echo "Running composer install..." >> "$LOG"
            cd "$TARGET/app"
            php ~/bin/composer.phar install --no-dev --optimize-autoloader >> "$LOG" 2>&1
            if [ $? -ne 0 ]; then
                echo "Composer install failed — rolling back" >> "$LOG"
                rm -rf "$TARGET/app"
                cp -r "$BACKUP_DIR" "$TARGET/app"
                echo "Rollback completed" >> "$LOG"
                exit 1
            fi
        fi

        if [ -f "$TARGET/app/bin/console" ]; then
            echo "Clearing Symfony cache manually..." >> "$LOG"
            rm -rf "$TARGET/app/var/cache/*" >> "$LOG" 2>&1

            echo "Clearing and warming Symfony cache..." >> "$LOG"
            php "$TARGET/app/bin/console" cache:clear --env=prod >> "$LOG" 2>&1
            if [ $? -ne 0 ]; then
                echo "Cache clear failed — rolling back" >> "$LOG"
                rm -rf "$TARGET/app"
                cp -r "$BACKUP_DIR" "$TARGET/app"
                echo "Rollback completed" >> "$LOG"
                exit 1
            fi
            php "$TARGET/app/bin/console" cache:warmup --env=prod >> "$LOG" 2>&1
        fi

        echo "Setting permissions..." >> "$LOG"
        find "$TARGET/app" -type f -exec chmod 644 {} \;
        find "$TARGET/app" -type d -exec chmod 755 {} \;
        chmod -R 775 "$TARGET/app/var"
        chmod -R 775 "$TARGET/app/vendor"
        chmod -R 775 "$TARGET/app/public"
        mkdir -p "$TARGET/app/var/log"
        chmod -R 775 "$TARGET/app/var/log"
        chown -R www-data:www-data "$TARGET/app"

        echo "---- deploy finished at $(date) ----" >> "$LOG"

        echo "Sending deployment notification email..." >> "$LOG"
        {
            echo "To: $MAILTO"
            echo "Subject: Déploiement terminé - $BRANCH"
            echo "Content-Type: text/plain; charset=UTF-8"
            echo ""
            echo "Bonjour,"
            echo ""
            echo "Le déploiement de la branche '$BRANCH' sur le serveur OVH s'est terminé avec succès."
            echo "Date : $(date)"
            echo "Répertoire : $TARGET"
            echo ""
            echo "Cordialement,"
            echo "Le système de déploiement automatique"
        } | sendmail -t
    else
        echo "Ref $ref not $BRANCH; skipping." >> "$LOG"
    fi
done
