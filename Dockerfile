FROM php:7.4-apache

# install mysql and php first
RUN apt-get update && \
    apt-get install -y --no-install-recommends default-mysql-server && \
    docker-php-ext-install mysqli pdo pdo_mysql && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# let .htaccess do AllowOverride
RUN a2enmod rewrite && \
    sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# copy files
COPY src/index.html /var/www/html/index.html
COPY src/upload.php /var/www/html/upload.php

# make uploads directory
RUN mkdir /var/www/html/uploads && \
    chown www-data:www-data /var/www/html/uploads && \
    chmod 755 /var/www/html/uploads

# create the .hidden directory
RUN mkdir /var/www/html/.hidden && \
    echo "CTF{y0ur_p4ssw0rd_h3re}" > /var/www/html/.hidden/password.txt && \
    chown -R www-data:www-data /var/www/html/.hidden && \
    chmod -R 700 /var/www/html/.hidden

EXPOSE 80
