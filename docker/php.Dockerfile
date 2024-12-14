FROM php:8.1-fpm
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions mongodb
COPY mclogs.ini /usr/local/etc/php/conf.d/mclogs.ini