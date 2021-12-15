FROM wordpress:5.7

WORKDIR /var/www/html/public_html

## Install composer
#RUN curl --fail -sS https://getcomposer.org/installer | php
COPY ./composer.phar /var/www/html/public_html/
RUN chmod +x composer.phar
RUN mv composer.phar /usr/bin/composer
RUN composer -V

## Install wp-cli
#RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
COPY ./wp-cli.phar /var/www/html/public_html/
RUN chmod +x wp-cli.phar
RUN mv wp-cli.phar /usr/local/bin/wp

## Copy the Apache configuration to the container
COPY ./000-default.conf /etc/apache2/sites-available/

