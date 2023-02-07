#!/bin/sh

touch database/database.sqlite \
&& php artisan migrate --seed --force --no-ansi --no-interaction \
&& php artisan optimize --no-ansi --no-interaction \
&& php artisan serve -vvv --host 0.0.0.0 --port 8080 --no-ansi --no-interaction
