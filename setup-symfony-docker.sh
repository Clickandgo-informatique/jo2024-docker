#!/bin/bash

# === CONFIG ===
PROJECT_NAME="jo2024-docker"
MYSQL_ROOT_PASSWORD="root"
MYSQL_DATABASE="jo2024"
MYSQL_USER="jo2024"
MYSQL_PASSWORD="jo2024"

# === INSTALLER SYMFONY CLI ===
if ! command -v symfony &> /dev/null; then
    echo "👉 Installation de Symfony CLI..."
    wget https://get.symfony.com/cli/installer -O - | bash
    sudo mv /home/$USER/.symfony*/bin/symfony /usr/local/bin/symfony
else
    echo "✅ Symfony CLI déjà installé."
fi

# === CRÉER DOCKERFILE POUR PHP ===
echo "👉 Génération du Dockerfile PHP"
mkdir -p docker/php
cat > docker/php/Dockerfile <<EOL
FROM php:8.2-fpm

# Installer dépendances système
RUN apt-get update && apt-get install -y \\
    git unzip zip libicu-dev libonig-dev libxml2-dev libzip-dev \\
    && docker-php-ext-install pdo pdo_mysql intl zip opcache \\
    && pecl install redis \\
    && docker-php-ext-enable redis

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/symfony
EOL

# === CRÉER FICHIERS DOCKER COMPOSE ===
echo "👉 Génération du docker-compose.yml"
cat > docker-compose.yml <<EOL
version: '3.9'

services:
  php:
    build:
      context: ./docker/php
    container_name: ${PROJECT_NAME}_php
    working_dir: /var/www/symfony
    volumes:
      - ./app:/var/www/symfony
    networks:
      - symfony

  web:
    image: nginx:alpine
    container_name: ${PROJECT_NAME}_nginx
    ports:
      - "8080:80"
    volumes:
      - ./app:/var/www/symfony
      - ./nginx.conf:/etc/nginx/conf.d/default.conf
    networks:
      - symfony
    depends_on:
      - php

  db:
    image: mysql:8.0
    container_name: ${PROJECT_NAME}_db
    environment:
      MYSQL_ROOT_PASSWORD: ${MYSQL_ROOT_PASSWORD}
      MYSQL_DATABASE: ${MYSQL_DATABASE}
      MYSQL_USER: ${MYSQL_USER}
      MYSQL_PASSWORD: ${MYSQL_PASSWORD}
    ports:
      - "3306:3306"
    volumes:
      - db_data:/var/lib/mysql
    networks:
      - symfony

  phpmyadmin:
    image: phpmyadmin/phpmyadmin:latest
    container_name: ${PROJECT_NAME}_pma
    environment:
      PMA_HOST: db
      PMA_USER: ${MYSQL_USER}
      PMA_PASSWORD: ${MYSQL_PASSWORD}
    ports:
      - "8081:80"
    depends_on:
      - db
    networks:
      - symfony

  mailhog:
    image: mailhog/mailhog
    container_name: ${PROJECT_NAME}_mailhog
    ports:
      - "1025:1025"   # port SMTP
      - "8025:8025"   # interface web
    networks:
      - symfony

  redis:
    image: redis:alpine
    container_name: ${PROJECT_NAME}_redis
    ports:
      - "6379:6379"
    networks:
      - symfony

volumes:
  db_data:

networks:
  symfony:
EOL

echo "👉 Génération du nginx.conf"
cat > nginx.conf <<EOL
server {
    listen 80;
    server_name localhost;

    root /var/www/symfony/public;
    index index.php index.html;

    location / {
        try_files \$uri /index.php\$is_args\$args;
    }

    location ~ \.php\$ {
        include fastcgi_params;
        fastcgi_pass php:9000;
        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
        fastcgi_param PATH_INFO \$fastcgi_path_info;
    }
}
EOL

# === CONFIGURER SYMFONY POUR MAILHOG ET REDIS ===
echo "👉 Configuration de Symfony..."
cat >> app/.env <<EOL

###> MailHog ###
MAILER_DSN=smtp://mailhog:1025
###< MailHog ###

###> Redis ###
REDIS_URL=redis://redis:6379
###< Redis ###
EOL

# === LANCER DOCKER ===
echo "👉 Build et démarrage des conteneurs Docker..."
docker compose build
docker compose up -d

echo "✅ Projet Symfony avec Docker complet prêt !"
echo "🌍 Application Symfony : http://localhost:8080"
echo "🛠️  PhpMyAdmin : http://localhost:8081 (user: ${MYSQL_USER}, pass: ${MYSQL_PASSWORD})"
echo "📧 MailHog : http://localhost:8025"
echo "⚡ Redis dispo sur : redis://localhost:6379"
echo "🎵 Extensions PHP installées : pdo_mysql, intl, zip, opcache, redis"
echo "🎶 Composer intégré dans le conteneur PHP"
