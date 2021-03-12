FROM php:7.4-apache


RUN apt-get update && apt-get upgrade -y

RUN apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-install zip mysqli pdo_mysql
