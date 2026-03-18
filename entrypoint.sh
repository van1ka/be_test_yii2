#!/bin/bash
set -e

composer install --no-interaction --prefer-dist --optimize-autoloader

mkdir -p runtime web/assets
chown -R www-data:www-data /var/www/html
chmod -R 755 runtime web/assets

exec apache2-foreground
