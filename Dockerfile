FROM debian:10

LABEL version="1.0"
LABEL description="Docker image for use at LAN parties."
LABEL org.opencontainers.image.authors="lukas@k40s.net"

# Update packages and install prerequisites
RUN apt-get -qqqqqq update && \
    apt-get -yqqqqq upgrade && \
    apt-get -yqqqqq install \
        curl \
        gnupg2 \
        supervisor \
        ca-certificates && \
    apt-get clean

# Add NGINX repo file
COPY image_files/nginx.list /etc/apt/sources.list.d/nginx.list

# Add PHP repo file
COPY image_files/php.list /etc/apt/sources.list.d/php.list

# Fetch signing keys
RUN curl -fsSL https://nginx.org/keys/nginx_signing.key | apt-key add - && \
    curl -fsSL https://packages.sury.org/php/apt.gpg | apt-key add -

# Install NGINX and PHP
RUN apt-get -qqqqqq update && \
    apt-get -yqqqqq install \
        nginx \
        php8.0-fpm \
        php8.0-common \
        php8.0-mysql \
        php8.0-gmp \
        php8.0-curl \
        php8.0-intl \
        php8.0-mbstring \
        php8.0-xmlrpc \
        php8.0-gd \
        php8.0-xml \
        php8.0-cli \
        php8.0-zip \
        php8.0-soap \
        php8.0-imap && \
    apt-get clean

# Disable services
RUN systemctl disable nginx && \
    systemctl disable php8.0-fpm

# Add php-fpm run dir
RUN mkdir -p /run/php

# Add nginx to www-data
RUN usermod -aG www-data nginx

# Copy NGINX config
COPY image_files/default.conf /etc/nginx/conf.d/default.conf

# Copy PHP config
COPY image_files/php.ini /etc/php/8.0/fpm/php.ini

# Copy PHP-FPM config
COPY image_files/php-fpm.conf /etc/php/8.0/fpm/php-fpm.conf

# Copy webapp
COPY --chown=www-data:www-data webapp/ /webapp/

# Download Transmission files
RUN curl -o /webapp/download/Transmission-3.00.dmg https://github.com/transmission/transmission-releases/raw/master/Transmission-3.00.dmg && \
    curl -o /webapp/download/Transmission-3.00-x64.msi https://github.com/transmission/transmission-releases/blob/master/transmission-3.00-x64.msi && \
    curl -o /webapp/download/Transmission-3.00-x86.msi https://github.com/transmission/transmission-releases/blob/master/transmission-3.00-x86.msi && \
    curl -o /webapp/download/Transmission-3.00.tar.xz https://github.com/transmission/transmission-releases/raw/master/transmission-3.00.tar.xz

# Copy supervisord config
COPY image_files/supervisord.conf /etc/supervisord.conf

# Expose port 80
EXPOSE 80

# Start services
ENTRYPOINT /usr/bin/supervisord -n -c /etc/supervisord.conf
#ENTRYPOINT /bin/bash