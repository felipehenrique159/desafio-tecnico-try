FROM php:8.2-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y --no-install-recommends \
  autoconf \
  build-essential \
  apt-utils \
  zlib1g-dev \
  libzip-dev \
  unzip \
  zip \
  libmagick++-dev \
  libmagickwand-dev \
  libpq-dev \
  libfreetype6-dev \
  libjpeg62-turbo-dev \
  libpng-dev \
  libonig-dev \
  supervisor \
  curl && \
  mkdir -p /var/log/supervisor && \
  pecl install redis &&  \
  docker-php-ext-enable redis

RUN docker-php-ext-configure gd --with-freetype --with-jpeg=/usr/include/ --enable-gd
RUN docker-php-ext-install gd intl pdo_mysql mysqli zip

RUN pecl install imagick
RUN docker-php-ext-enable imagick

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN mkdir /var/www/storage
RUN chown -R root:www-data /var/www/storage
RUN chmod u+rwx,g+rx,o+rx /var/www/storage

RUN chmod -R 777 /var/www

WORKDIR /var/www
