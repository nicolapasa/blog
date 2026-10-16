# Deploy Ergonet

Production branch: `main`. Development branch: `improvements/blog`.
Target: `/var/www/vhosts/nicolapasa.com/httpdocs`.

## First setup

1. Back up the existing site files and database using the hosting panel.
2. Configure the domain document root as `httpdocs/public` in Ergonet. The application and its private configuration must stay outside the published directory.
3. Place the production database configuration in `httpdocs/app/config.ini.database.php`, using `app/database.example.php` as a template. Create the `app` directory if missing. Do not use local development credentials.
4. Place the SMTP configuration in `httpdocs/app/config.ini.mail.php`, using `app/mail.example.php`. Set the trusted `base_url` to `https://nicolapasa.com/`.
5. Preserve/copy existing uploaded images into `httpdocs/public/images` before deploying if the old installation stores them elsewhere.
6. Ensure PHP 8.3+ is selected both for the website and the SSH `php` command. Verify `composer`, `rsync`, `pdo_mysql`, `openssl`, `mbstring` and `fileinfo` are available.
7. Create a dedicated SSH deployment key without a passphrase, authorize its public key in Ergonet, and put its private key in GitHub Settings → Environments → `production` → Secrets as `ERGONET_SSH_PRIVATE_KEY`.
8. Add `ERGONET_SSH_KNOWN_HOSTS` containing the verified SSH host key entry for `[ssh.nicolapasa.com]:13458`. Use the entry from your trusted local `known_hosts` after confirming the host fingerprint. Do not disable host key checking.
9. Commit and push development work, then merge `improvements/blog` into `main`. The push to `main` triggers deployment; manual runs also require selecting `main`.

The workflow copies application files without deleting destination files. It excludes Git metadata, credentials, installed dependencies and runtime state. Existing image files are preserved; missing repository images are added. Composer installs the exact locked dependencies on the server. There is no database migration or automatic deletion of obsolete application files.

The production site uses `public/config.php` to derive paths and URLs; the old `public/config.ini.php` and `config.ini.dev.php` are no longer loaded. Database and SMTP configuration remain private, ignored local PHP files.

This initial workflow updates files in place, so schedule the first deploy during low traffic. Server verification and the first real deployment must be completed after configuring the GitHub secrets. No site or database backup is created by the workflow itself.
