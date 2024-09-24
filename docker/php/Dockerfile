FROM php:8.2-fpm

RUN apt-get update && \
    apt-get install -y \
    curl;

RUN apt-get install git --yes && \
    apt-get install -y zlib1g-dev libzip-dev && docker-php-ext-install zip;

RUN curl -sS https://getcomposer.org/installer | php \
    && chmod +x composer.phar && mv composer.phar  /usr/local/bin/composer

RUN docker-php-ext-install pdo_mysql zip;

WORKDIR /var/www/html


