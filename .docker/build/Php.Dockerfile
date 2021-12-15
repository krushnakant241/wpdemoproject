ARG versioncode=adhocore/phpfpm:7.4

FROM $versioncode

## Override system smtp service
RUN wget https://github.com/mailhog/mhsendmail/releases/download/v0.2.0/mhsendmail_linux_amd64
RUN chmod +x mhsendmail_linux_amd64
RUN mv mhsendmail_linux_amd64 /usr/local/bin/mhsendmail

## Install composer
RUN (curl --fail -sS https://getcomposer.org/installer | php) && \
    chmod +x composer.phar && \
    mv composer.phar /usr/bin/composer && \
    composer -V

## Install wp-cli
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
RUN chmod +x wp-cli.phar
RUN mv wp-cli.phar /usr/local/bin/wp


# RUN wp core install --path="/var/www/html" --url="http://localhost" --title="Wordpress Boilerplate" --admin_user=admin --admin_password=admin --admin_email=localhost@sbmclient.com
