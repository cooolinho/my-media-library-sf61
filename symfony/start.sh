#!/bin/bash

# install dependencies
echo "➡️ Installing dependencies"
composer install --ignore-platform-reqs
yarn install
echo "✅ Installing dependencies complete"

# run migrations
echo "➡️ Run migrations"
php bin/console doctrine:migrations:migrate --no-interaction
echo "✅ Run migrations complete"

# build assets
echo "➡️ Building assets 'npm run build'"
npm run build
echo "✅ Building assets Complete"

# install assets
echo "➡️ Installing assets 'php bin/console assets:install'"
php bin/console assets:install
echo "✅ Installing assets complete"
