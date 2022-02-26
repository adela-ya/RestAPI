FROM php:8.1-fpm

COPY ./src/ /var/www

# install system dependencies
RUN apt update && apt install -y git && apt install -y vim

# install php extensions
RUN docker-php-ext-install pdo_mysql

# Get latest composer
COPY --from=composer:latest /usr/bin/composer /user/bin/composer

# Set working dir
WORKDIR /var/www