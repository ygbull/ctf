FROM php:7.4-apache

# install mysql, php extensions and python
RUN apt-get update && \
    apt-get install -y --no-install-recommends default-mysql-server python3 && \
    docker-php-ext-install mysqli pdo pdo_mysql && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# let .htaccess do AllowOverride
RUN a2enmod rewrite && \
    sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# copy files
COPY src/index.php /var/www/html/index.php
COPY src/upload.php /var/www/html/upload.php
COPY src/verify.php /var/www/html/verify.php
COPY src/generatePW.py /tmp/generatePW.py

# make uploads directory
RUN mkdir /var/www/html/uploads && \
    chown www-data:www-data /var/www/html/uploads && \
    chmod 755 /var/www/html/uploads

# create the flag file and set the generated password
RUN python3 /tmp/generatePW.py > /etc/flag && \
    chown root:root /etc/flag && \
    chmod 444 /etc/flag

ENV FLAG "9c2c9f937a52aeea5dcaf7885dd835ee"

EXPOSE 80
