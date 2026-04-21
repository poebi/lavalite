FROM php:8.2-apache

# 1. Install PDO MySQL for database connectivity
RUN docker-php-ext-install pdo pdo_mysql

# 2. Enable Apache mod_rewrite for Laravel routing
RUN a2enmod rewrite

# 3. Change Apache Document Root to /var/www/html/public
# This fixes the 403 Forbidden / No matching DirectoryIndex error
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# 4. Set the working directory
WORKDIR /var/www/html

# 5. Copy all project files into the container
COPY . /var/www/html/

# 6. Ensure storage and cache folders exist and set permissions
# We do this AFTER the COPY command so the folders are actually there
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache && \
    chown -R www-data:www-data /var/www/html && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 7. Expose port 80
EXPOSE 80