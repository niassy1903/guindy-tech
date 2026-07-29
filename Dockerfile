FROM php:8.3-apache

WORKDIR /var/www/html

# Installation des dépendances système
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    && docker-php-ext-install \
    pdo \
    pdo_mysql \
    zip

# Activation rewrite Apache pour Laravel
RUN a2enmod rewrite

# Configuration Apache vers public/
RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf


# Installation Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


# Copier le projet
COPY . .


# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader


# Permissions Laravel
RUN chown -R www-data:www-data storage bootstrap/cache


EXPOSE 80


CMD ["apache2-foreground"]
