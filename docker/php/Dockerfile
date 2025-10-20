# ===========================================
# Étape 1 : Builder (Composer + dépendances)
# ===========================================
FROM php:8.3-fpm AS builder

# Installer dépendances système et extensions PHP nécessaires au build
RUN apt-get update && apt-get install -y \
    unzip zip git libicu-dev libonig-dev libxml2-dev libzip-dev \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev libwebp-dev libxpm-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install pdo_mysql intl zip opcache gd \
    && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/symfony

# Copier uniquement composer.* pour profiter du cache Docker
COPY ./app/composer.* ./

# Installer les dépendances PHP (inclut dev)
RUN composer install --optimize-autoloader --no-scripts --no-interaction

# Copier tout le reste du projet
COPY ./app ./

# ===========================================
# Étape finale : PHP-FPM + Xdebug
# ===========================================
FROM php:8.3-fpm

WORKDIR /var/www/symfony

# Installer extensions PHP nécessaires
RUN apt-get update && apt-get install -y \
    unzip zip git libicu-dev libonig-dev libxml2-dev libzip-dev \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev libwebp-dev libxpm-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install pdo_mysql intl zip opcache gd \
    && rm -rf /var/lib/apt/lists/*

# Copier le projet depuis le builder
COPY --from=builder /var/www/symfony ./

# Copier Composer dans l'image finale
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Installer Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Copier la conf PHP
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini

# Copier l'entrypoint
COPY ./docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Utilisateur non-root
USER www-data

# Entrypoint et CMD
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["php-fpm"]
