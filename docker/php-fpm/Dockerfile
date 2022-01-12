FROM php:8.0-fpm-alpine

WORKDIR "/application"

RUN apk update

RUN apk add $PHPIZE_DEPS
RUN apk add libxml2-dev
RUN apk add libmemcached-dev
RUN apk add zip
RUN apk add rabbitmq-c-dev
RUN apk add libssh-dev
RUN apk add bash
RUN apk add openssh
RUN apk add libmcrypt-dev

RUN pecl install memcached
RUN echo extension=memcached.so >> /usr/local/etc/php/conf.d/memcached.ini

RUN apk add git
RUN apk add vim

RUN  apk add --update icu
RUN apk add --virtual .build-deps
RUN apk add zlib-dev
RUN apk add icu-dev
RUN apk add g++

RUN docker-php-ext-install intl
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install opcache


RUN apk add zip libzip-dev
RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer