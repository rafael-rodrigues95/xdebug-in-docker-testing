FROM php:7.4-apache

# COPY 90-xdebu.ini "${PHP_INI_DIR}/conf.d"

RUN apt-get update && apt upgrade -y
RUN docker-php-ext-install pdo mysqli pdo_mysql \
&& docker-php-ext-enable mysqli 
RUN pecl install xdebug-3.1.5 \
&& docker-php-ext-enable xdebug
ADD ./app /var/www/html
COPY ./app/test-form.conf /etc/apache2/sites-available/test-form.conf

# Copy php.ini
COPY ./php.ini /usr/local/etc/php

RUN echo 'SetEnv MYSQL_DB_CONNECTION ${MYSQL_DB_CONNECTION}' >> /etc/apache2/conf-enabled/environment.conf
RUN echo 'SetEnv MYSQL_DB_NAME ${MYSQL_DB_NAME}' >> /etc/apache2/conf-enabled/environment.conf
RUN echo 'SetEnv MYSQL_USER ${MYSQL_USER}' >> /etc/apache2/conf-enabled/environment.conf
RUN echo 'SetEnv MYSQL_PASSWORD ${MYSQL_PASSWORD}' >> /etc/apache2/conf-enabled/environment.conf
RUN echo 'SetEnv SITE_URL ${SITE_URL}' >> /etc/apache2/conf-enabled/environment.conf
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf &&\
    a2enmod rewrite &&\
    a2enmod headers &&\
    a2enmod rewrite &&\
    a2dissite 000-default &&\
    a2ensite test-form &&\
    service apache2 restart
# EXPOSE 80
# EXPOSE 443