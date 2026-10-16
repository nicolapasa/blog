#!/bin/sh
set -eu
site_path='/var/www/vhosts/nicolapasa.com/httpdocs'
command -v php >/dev/null
command -v composer >/dev/null
command -v rsync >/dev/null
php -r 'if (PHP_VERSION_ID < 80300) { fwrite(STDERR, "PHP CLI 8.3 or newer required\n"); exit(1); }'
test -d "$site_path"
test -w "$site_path"
test -f "$site_path/app/config.ini.database.php" || { echo 'Missing app/config.ini.database.php: configure production database first.' >&2; exit 1; }
