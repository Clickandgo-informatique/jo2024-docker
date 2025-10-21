#!/bin/bash
set -e

echo "=== Initialisation du conteneur Symfony ==="

mkdir -p var/cache/dev var/cache/test var/cache/prod var/log public/uploads migrations

if [[ "$(uname -s | grep -i mingw)" = "" && "$(uname -s | grep -i msys)" = "" ]]; then
    echo "Application des permissions Linux..."
    chown -R www-data:www-data var public/uploads migrations || true
    chmod -R 775 var public/uploads migrations || true
else
    echo "Windows/WSL détecté, permissions ignorées."
fi

rm -rf var/cache/* var/log/* || true

wait_for_mysql() {
    local host=${1:-db}
    local port=${2:-3306}
    local retries=30
    local count=0
    echo "Attente de MySQL sur $host:$port..."
    
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

wait_for_symfony() {
    local retries=15
    local count=0
    echo "Attente Symfony..."
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

php bin/console doctrine:database:create --if-not-exists --env=dev || true
php bin/console doctrine:database:create --if-not-exists --env=test || true
php bin/console cache:warmup --env=dev || true
php bin/console cache:warmup --env=test || true
php bin/console doctrine:migrations:migrate --env=dev --no-interaction || true
php bin/console doctrine:migrations:migrate --env=test --no-interaction || true
php bin/console doctrine:fixtures:load --env=dev --no-interaction || true
php bin/console doctrine:fixtures:load --env=test --no-interaction || true

echo "Démarrage du service : $@"
exec "$@"
