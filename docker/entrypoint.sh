#!/usr/bin/env sh
set -e

php artisan optimize:clear
php artisan key:generate
php artisan config:cache
php artisan route:cache
php artisan event:cache
php artisan view:cache

php-fpm -D
nginx -g 'daemon off;'
