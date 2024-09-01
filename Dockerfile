# Utiliser l'image PHP officielle avec Apache
FROM php:8.2-apache

# Installer les extensions nécessaires
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    unzip \
    git

# Installer Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copier les fichiers de configuration
COPY composer.json composer.lock ./

# Installer les dépendances PHP avec Composer
RUN composer install --no-autoloader --no-scripts

# Copier le reste des fichiers de l'application
COPY . /var/www/html

# Définir les permissions
RUN chown -R www-data:www-data /var/www/html

# Exposer le port 80
EXPOSE 80
