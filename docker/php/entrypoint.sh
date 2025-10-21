#!/bin/bash
set -e

echo "=== Initialisation complète du conteneur Symfony ==="

# --------------------------
# Dossiers nécessaires
# --------------------------
mkdir -p var/cache/dev var/cache/test var/cache/prod var/log public/uploads migrations

# Permissions Linux
if [[ "$(uname -s)" != MINGW64_NT* && "$(uname -s)" != MSYS_NT* ]]; then
    echo "Application des permissions Linux..."
    chown -R www-data:www-data var public/uploads migrations
    chmod -R 775 var public/uploads migrations
else
    echo "Système Windows/WSL détecté, permissions ignorées."
fi

# Nettoyage du cache et logs
echo "Nettoyage du cache et logs..."
rm -rf var/cache/* var/log/*

# --------------------------
# Attente MySQL
# --------------------------
wait_for_mysql() {
    local host=${1:-db}
    local port=${2:-3306}
    local retries=30
    local count=0
    echo "Attente de MySQL sur $host:$port..."
    
    # Boucle avec PHP au lieu de nc
    until php -r "try { new PDO('mysql:host=$host;port=$port;dbname=jo2024','jo2024','jo2024'); echo 'ok'; } catch(Exception \$e) { exit(1); }" > /dev/null 2>&1; do
        count=$((count+1))
        if [ $count -ge $retries ]; then
            echo "Erreur : Impossible de se connecter à MySQL après $retries tentatives."
            exit 1
        fi
        echo "MySQL non prêt ($count/$retries), attente 2s..."
        sleep 2
    done
    echo "MySQL prêt."
}
wait_for_mysql

# --------------------------
# Attente Symfony
# --------------------------
wait_for_symfony() {
    local retries=15
    local count=0
    echo "Attente de Symfony..."
    until php bin/console list > /dev/null 2>&1; do
        count=$((count+1))
        if [ $count -ge $retries ]; then
            echo "Erreur : Symfony ne répond pas après $retries tentatives."
            exit 1
        fi
        echo "Symfony non prêt ($count/$retries), attente 2s..."
        sleep 2
    done
    echo "Symfony prêt."
}
wait_for_symfony

# --------------------------
# Création des bases si absentes
# --------------------------
php bin/console doctrine:database:create --if-not-exists --env=dev
php bin/console doctrine:database:create --if-not-exists --env=test

# --------------------------
# Cache Symfony
# --------------------------
php bin/console cache:warmup --env=dev
php bin/console cache:warmup --env=test

# --------------------------
# Migrations Doctrine
# --------------------------
php bin/console doctrine:migrations:migrate --env=dev --no-interaction || true
php bin/console doctrine:migrations:migrate --env=test --no-interaction || true

# --------------------------
# Chargement des fixtures
# --------------------------
php bin/console doctrine:fixtures:load --env=dev --no-interaction || true
php bin/console doctrine:fixtures:load --env=test --no-interaction || true

# --------------------------
# Démarrage du service principal
# --------------------------
echo "Démarrage du service : $@"
exec "$@"
