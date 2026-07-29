#!/bin/bash

echo "Migration database..."

php artisan migrate --force


echo "Cache Laravel..."

php artisan config:cache
php artisan route:cache
php artisan view:cache


echo "Starting Apache..."

apache2-foreground