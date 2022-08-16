FROM php:7.4.30-apache

RUN apt-get update && apt-get install -y \
    		libfreetype6-dev \
    		libjpeg62-turbo-dev \
    		libpng-dev \
    	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
    	&& docker-php-ext-install gd \
        && docker-php-ext-install mysqli

RUN a2enmod rewrite
RUN apachectl restart