FROM php:8.2-apache

# Install ekstensi PHP yang diperlukan
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Aktifkan mode rewrite di Apache
RUN a2enmod rewrite

EXPOSE 80
