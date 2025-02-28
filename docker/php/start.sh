#!/bin/bash

# Warte auf den MySQL-Container (dabei wird der DB-Host aus der Umgebungsvariable verwendet)
/usr/local/bin/wait-for-it.sh db:3306 --timeout=60 --strict -- echo "➡️ MySQL is up - executing migration..."

# run migrations
php bin/console doctrine:migrations:migrate --no-interaction
echo "✅ Migrations complete"

# run php-server
php-fpm
