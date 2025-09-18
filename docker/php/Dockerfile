FROM php:8.2-fpm

# Installer dépendances système
RUN apt-get update && apt-get install -y \
    git unzip zip libicu-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql intl zip opcache \
    && pecl install redis \
    && docker-php-ext-enable redis

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

#Intallation de Xdebug pour les tests
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

#Paramètrages de Git
RUN git config --global user.email "mail@clickandgo-informatique.com"
RUN git config --global user.name "Clickandgo-informatique"

WORKDIR /var/www/symfony
