FROM php:8.5-apache

WORKDIR /var/www/html


# Installer dépendances PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    nodejs \
    npm \
    && docker-php-ext-install \
    pdo \
    pdo_mysql \
    zip


# Apache Laravel
RUN a2enmod rewrite

RUN sed -ri -e 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/*.conf


# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


# Copier projet
COPY . .


# Installer dépendances PHP
RUN composer install --no-dev --optimize-autoloader


# Installer dépendances frontend
RUN npm install


# Compiler Vite
RUN npm run build


# Permissions Laravel
RUN chown -R www-data:www-data storage bootstrap/cache


# Script démarrage
COPY start.sh /usr/local/bin/start.sh

RUN chmod +x /usr/local/bin/start.sh


EXPOSE 80


CMD ["start.sh"]