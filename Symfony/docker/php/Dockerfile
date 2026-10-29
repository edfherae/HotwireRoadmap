FROM php:8.5-fpm-alpine

# Установщик расширений (решает зависимости автоматически)
ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# Ставим все нужные расширения одной командой
RUN install-php-extensions \
    pdo_mysql \
    intl \
    zip \
    opcache \
    xdebug

# Наш php.ini
COPY docker/php/php.ini /usr/local/etc/php/conf.d/99-app.ini

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html