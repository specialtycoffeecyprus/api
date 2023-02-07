FROM php:8.2-fpm-alpine

LABEL fly_launch_runtime="laravel"

RUN apk add --update --no-cache nginx \
    && apk add --no-cache --virtual .build-dependencies $PHPIZE_DEPS \
    && pecl install apcu \
    && docker-php-ext-enable apcu opcache \
    && pecl clear-cache \
    && apk del .build-dependencies \
    && rm -fr /tmp/* /usr/src/* /usr/local/include/ /usr/local/lib/php/build/ /usr/local/lib/php/doc/ /usr/local/lib/php/test/ /usr/local/php/ \
    && chown -Rf www-data:www-data /var/lib/nginx

COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY docker/ /

WORKDIR /var/www/html

COPY --chown=www-data:www-data composer.* ./

ENV COMPOSER_ALLOW_SUPERUSER 1

RUN composer install --no-autoloader --no-ansi --no-cache --no-dev --no-interaction --no-progress --no-scripts \
    && chown -R www-data:www-data /var/www/html/vendor/

COPY --chown=www-data:www-data . .

RUN composer dump-autoload --classmap-authoritative --no-ansi --no-cache --no-interaction \
    && chown -R www-data:www-data \
      /var/www/html/vendor/autoload.php \
      /var/www/html/vendor/composer/autoload_*.php \
      /var/www/html/vendor/composer/ClassLoader.php \
      /var/www/html/vendor/composer/LICENSE

EXPOSE 8080

CMD ["/bin/sh", "/run.sh"]
