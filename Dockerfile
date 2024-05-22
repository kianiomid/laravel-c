FROM php:8.2-fpm-alpine3.16

# Arguments defined in docker-compose.yml
#RUN rm -f /etc/apk/repositories &&\
#    echo "http://dl-cdn.alpinelinux.org/alpine/v3.16/main" >> /etc/apk/repositories && \
#    echo "http://dl-cdn.alpinelinux.org/alpine/v3.16/community" >> /etc/apk/repositories

# Add Dependencies
RUN apk add --update --no-cache \
        nginx \
        icu-data-full \
        icu \
        icu-dev \
        libxml2 \
        libxml2-dev \
        libxslt \
        libxslt-dev \
        ldb \
        ldb-dev \
        libldap \
        openldap \
        openldap-dev

# Add PHP Extensions
RUN docker-php-ext-install -j$(nproc) \
		bcmath \
		gd \
		intl \
		mysqli \
		pdo \
		pdo_mysql \
		soap \
		tidy \
		xsl \
        gmp \
        sockets

# Configure Extension
RUN docker-php-ext-configure \
    opcache --enable-opcache

# Installing composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm -rf composer-setup.php

# Installing
RUN mkdir -p /var/www/html

# Setup Working Dir
WORKDIR /var/www/html
COPY . .
COPY docker/index.php .

#COPY .env.example .env
RUN touch /var/www/html/storage/logs/laravel.log

RUN chown -R www-data:www-data /var/www/html
USER www-data
RUN composer install --prefer-dist --no-dev -o --optimize-autoloader --no-interaction --no-plugins --no-scripts --no-cache

USER root

COPY .docker/nginx/nginx.conf /etc/nginx/nginx.conf
COPY .docker/nginx/default.conf /etc/nginx/http.d/default.conf
COPY .docker/entrypoint.sh /usr/bin/entrypoint.sh
RUN chmod +x /usr/bin/entrypoint.sh

EXPOSE 80
ENTRYPOINT ["/usr/bin/entrypoint.sh"]
