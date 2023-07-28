FROM node:18.7.0 as frontend
WORKDIR /app
COPY package* .
RUN npm install
COPY . .
RUN npm run build
#RUN rm -rf node_modules

FROM php:8.1
RUN apt-get update && apt-get install -y zip git cron
# https://github.com/mlocati/docker-php-extension-installer
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions pdo pdo_mysql sockets xdebug
COPY php.ini /usr/local/etc/php/
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY --from=frontend /app /app
WORKDIR /app
RUN COMPOSER_ALLOW_SUPERUSER=1  composer install
COPY .env.docker .env
COPY run-cron.sh /run-cron.sh
RUN chmod a+x /run-cron.sh
RUN php artisan key:generate


