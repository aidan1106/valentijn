FROM php:8.2-apache

# Installeer systeem packages + PHP extensies die Laravel nodig heeft
RUN apt-get update && apt-get install -y \
    git zip unzip libzip-dev \
    && docker-php-ext-install pdo pdo_mysql

# Apache rewrite aan (nodig voor Laravel routes)
RUN a2enmod rewrite

# Zet Apache document root naar Laravel /public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Werkdirectory
WORKDIR /var/www/html

# Composer binary kopiëren
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Projectbestanden kopiëren
COPY . .

# Dependencies installeren
RUN composer install --no-dev --optimize-autoloader

# Permissions fixen
RUN chown -R www-data:www-data storage bootstrap/cache

# Laravel setup (niet laten crashen als .env ontbreekt)
RUN php artisan key:generate || true
RUN php artisan storage:link || true

EXPOSE 80
