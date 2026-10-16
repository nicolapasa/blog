#!/bin/sh
set -eu
cd /var/www/vhosts/nicolapasa.com/httpdocs
composer install --no-dev --prefer-dist --no-interaction --no-progress --optimize-autoloader
composer check-platform-reqs --no-dev
php -l public/index.php
php -l public/config.php
mkdir -p app/runtime/forms
chmod 700 app/runtime app/runtime/forms
printf '%s\n' 'Deployment completed.'
