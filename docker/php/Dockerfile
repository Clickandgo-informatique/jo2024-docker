# Étape 1 : build avec Composer
FROM php:8.3-fpm AS builder

# Installer dépendances système et extensions PHP
RUN apt-get update && apt-get install -y \
    unzip zip libicu-dev libonig-dev libxml2-dev libzip-dev \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev libwebp-dev libxpm-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
 && docker-php-ext-install \
        pdo_mysql \
        intl \
        zip \
        opcache \
        gd \
 && rm -rf /var/lib/apt/lists/*

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/symfony

# Copier uniquement composer.* pour cache Docker
COPY ./app/composer.* ./

# Installer dépendances PHP
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copier le reste du projet
COPY ./app ./

# --- Étape finale ---
FROM php:8.3-fpm

# Installer extensions nécessaires
RUN apt-get update && apt-get install -y \
    libicu-dev libonig-dev libxml2-dev libzip-dev \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev libwebp-dev libxpm-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
 && docker-php-ext-install \
        pdo_mysql \
        intl \
        zip \
        opcache \
        gd \
 && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/symfony

# Copier le projet depuis le builder
COPY --from=builder /var/www/symfony ./

# Garder Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copier la conf PHP
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini

# --- Entrypoint pour préparer cache et logs ---
COPY ./docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

USER www-data

CMD ["php-fpm"]
ENTRYPOINT ["entrypoint.sh"]