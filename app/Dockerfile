FROM php:8.2-apache

RUN docker-php-ext-install mysqli pdo pdo_mysql

COPY apache-vhost.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html
