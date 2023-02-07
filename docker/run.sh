#!/bin/sh

touch database/database.sqlite \
&& php artisan migrate --force --no-ansi --no-interaction \
&& php artisan event:cache --no-ansi --no-interaction \
&& php artisan route:cache --no-ansi --no-interaction \
&& php artisan view:cache --no-ansi --no-interaction \
&& chown -R www-data:www-data \
    /var/www/html/bootstrap/cache/ \
    /var/www/html/storage/framework/views/

php-fpm --daemonize
nginx
