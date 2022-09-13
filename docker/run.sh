#!/bin/sh

touch database/database.sqlite \
&& php artisan migrate --force --no-interaction --seed \
&& php artisan optimize \
&& php artisan serve -vvv --host 0.0.0.0 --port 8080
