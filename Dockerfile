FROM php:8.1.0-fpm
RUN apt-get update && apt-get install -y git \
    zlib1g-dev \
    libzip-dev \
    unzip
RUN docker-php-ext-install zip
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www
