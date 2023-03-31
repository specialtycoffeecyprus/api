#!/bin/sh

touch database/database.sqlite \
&& php artisan migrate --seed --force --no-ansi --no-interaction \
&& php artisan optimize --no-ansi --no-interaction \
&& php artisan event:cache --no-ansi --no-interaction \
&& php artisan view:cache --no-ansi --no-interaction \
&& chown -R www-data:www-data \
    /var/www/html/bootstrap/cache/ \
    /var/www/html/storage/framework/views/

php-fpm --daemonize
nginx -g 'daemon off;'
