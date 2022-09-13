FROM php:8.1-cli-alpine

LABEL fly_launch_runtime="laravel"

RUN docker-php-ext-enable opcache
RUN curl -sS --compressed https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY docker/run.sh /
COPY docker/php/ ${PHP_INI_DIR}/

USER www-data:www-data
WORKDIR /var/www/html

COPY --chown=www-data:www-data composer.* ./

ENV COMPOSER_CACHE_DIR /dev/null

RUN composer install --no-autoloader --no-dev --no-interaction --no-scripts

COPY --chown=www-data:www-data . .

RUN composer dump-autoload --classmap-authoritative --no-interaction

EXPOSE 8080

CMD ["/bin/sh", "/run.sh"]
