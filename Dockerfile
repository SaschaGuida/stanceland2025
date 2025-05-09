FROM php:8.2-apache

# Installa dipendenze di sistema
RUN apt-get update && apt-get install -y \
    git zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Abilita mod_rewrite per Laravel
RUN a2enmod rewrite

# Copia i file dell'app nel container
COPY . /var/www/html

# Imposta working dir
WORKDIR /var/www/html

# Installa Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installa dipendenze Laravel
RUN composer install --no-dev --optimize-autoloader

# Imposta i permessi
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Esegui le migrazioni in automatico (facoltativo)
RUN php artisan migrate --force
