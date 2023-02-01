#!/bin/sh

touch database/database.sqlite \
&& php artisan migrate --force --no-ansi --no-interaction --seed \
&& php artisan optimize --no-ansi --no-interaction \
&& php artisan serve -vvv --host 0.0.0.0 --port 8080 --no-ansi --no-interaction
