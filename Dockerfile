# Use PHP 8.1 with Apache
FROM php:8.1-apache

# Enable required PHP extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable mod_rewrite (required for CodeIgniter routing)
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Copy everything into the container
COPY . .

# Give permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 80
EXPOSE 80
