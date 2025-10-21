# ===========================================
# Étape 1 : Builder (Composer + dépendances)
# ===========================================
FROM php:8.3-fpm AS builder

RUN apt-get update && apt-get install -y --no-install-recommends \
    unzip zip git libicu-dev libonig-dev libxml2-dev libzip-dev \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev libwebp-dev libxpm-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install pdo_mysql intl zip opcache gd \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/symfony
COPY ./app/composer.* ./
RUN composer install --optimize-autoloader --no-scripts --no-interaction
COPY ./app ./

# ===========================================
# Étape finale : PHP-FPM + Xdebug
# ===========================================
FROM php:8.3-fpm

WORKDIR /var/www/symfony

RUN apt-get update && apt-get install -y --no-install-recommends \
    unzip zip git libicu-dev libonig-dev libxml2-dev libzip-dev \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev libwebp-dev libxpm-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install pdo_mysql intl zip opcache gd \
    && rm -rf /var/lib/apt/lists/*

COPY --from=builder /var/www/symfony ./
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN pecl install xdebug && docker-php-ext-enable xdebug

COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/php.ini
COPY ./docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

USER www-data

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
CMD ["php-fpm"]
