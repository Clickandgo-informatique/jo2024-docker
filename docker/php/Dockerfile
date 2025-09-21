# Étape 1 : Build avec Composer
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

# Copier uniquement les fichiers composer.* pour profiter du cache Docker
COPY ./app/composer.* ./

# Installer dépendances PHP sans dev
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copier le reste du projet
COPY ./app ./

# Compiler le cache Symfony
RUN APP_ENV=prod APP_DEBUG=0 composer dump-autoload --optimize \
    && php bin/console cache:clear --env=prod \
    && php bin/console cache:warmup --env=prod

---

# Étape 2 : Image finale légère
FROM php:8.3-fpm

# Installer seulement les extensions nécessaires
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

# Copier depuis le builder
COPY --from=builder /var/www/symfony ./

# Ajouter une conf PHP (Opcache activé)
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini

CMD ["php-fpm"]
