FROM php:7.4-apache

RUN apt-get update && docker-php-ext-install mysqli

RUN cp "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY /php.ini /php.d/