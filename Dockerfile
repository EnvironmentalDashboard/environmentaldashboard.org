FROM php:7.2-apache
COPY . /var/www/html
COPY ./apache/httpd.conf /etc/apache2/sites-enabled
RUN a2enmod rewrite
RUN a2dissite 000-default.conf
