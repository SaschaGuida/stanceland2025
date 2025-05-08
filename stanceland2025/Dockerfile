FROM php:8.2-apache

# Installa estensioni PHP necessarie
RUN apt-get update && apt-get install -y \
    git zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Copia i file del progetto nel container
COPY . /var/www/html

# Imposta la working dir
WORKDIR /var/www/html

# Installa Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Installa dipendenze Laravel
RUN composer install

# Permessi
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Abilita rewrite per Laravel
RUN a2enmod rewrite
