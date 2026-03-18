#!/bin/bash
set -e

composer install --no-interaction --prefer-dist --optimize-autoloader

mkdir -p runtime web/assets
chown -R www-data:www-data runtime web/assets vendor
chmod -R 755 runtime web/assets

exec apache2-foreground
