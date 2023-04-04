FROM php:8-apache

RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN apt-get update && apt-get install -y ssmtp
RUN echo "mailhub=mailcatcher:1025\nUseTLS=NO" > /etc/ssmtp/ssmtp.conf

COPY --chown=www-data:www-data ./src /var/www/html
RUN chown -R www-data:www-data /var/www/html

CMD ["apache2-foreground"]