FROM php:7.1-apache

RUN a2enmod rewrite
RUN a2enmod actions

COPY ./php/php.ini /usr/local/etc/php/conf.d/server.ini