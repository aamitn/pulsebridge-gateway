FROM php:8.3.1-fpm
ARG WORKDIR=/var/www/html
ENV DOCUMENT_ROOT=${WORKDIR}
ENV DOMAIN=_
ENV CLIENT_MAX_BODY_SIZE=15M
ARG GROUP_ID=1000
ARG USER_ID=1000
ENV USER_NAME=www-data
ARG GROUP_NAME=www-data

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libmemcached-dev \
    libonig-dev \
    supervisor \
    libzip-dev \
    libpq-dev \
    zip \
    unzip \
    cron

# Install nginx
RUN apt-get install -y nginx

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions zip, mbstring, exif, bcmath, intl
RUN docker-php-ext-install zip mbstring pcntl opcache bcmath -j$(nproc)

# Install the php memcached extension
RUN pecl install memcached && docker-php-ext-enable memcached


# Download Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"


# Create a log directory and give permissions
RUN mkdir -p /var/www/html/logs && \
    chown -R www-data:www-data /var/www/html/logs

# Create a data storage directory
RUN mkdir -p /var/www/html/data && \
    chown -R www-data:www-data /var/www/html/data


# Set working directory
WORKDIR $WORKDIR

ADD . $WORKDIR/

# Install PHP dependencies using Composer
RUN composer install

ADD docker/php.ini $PHP_INI_DIR/conf.d/
ADD docker/opcache.ini $PHP_INI_DIR/conf.d/
ADD docker/supervisord.conf /etc/supervisor/supervisord.conf

COPY docker/entrypoint.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/entrypoint.sh
RUN ln -s /usr/local/bin/entrypoint.sh /


RUN rm -rf /etc/nginx/conf.d/default.conf
RUN rm -rf /etc/nginx/sites-enabled/default
RUN rm -rf /etc/nginx/sites-available/default

RUN rm -rf /etc/nginx/nginx.conf

COPY docker/nginx.conf /etc/nginx/nginx.conf
COPY docker/default.conf /etc/nginx/conf.d/

RUN usermod -u ${USER_ID} ${USER_NAME}
RUN groupmod -g ${USER_ID} ${GROUP_NAME}

RUN mkdir -p /var/log/supervisor
RUN mkdir -p /var/log/nginx
RUN mkdir -p /var/cache/nginx

RUN chown -R ${USER_NAME}:${GROUP_NAME} /var/www && \
  chown -R ${USER_NAME}:${GROUP_NAME} /var/log/ && \
  chown -R ${USER_NAME}:${GROUP_NAME} /etc/supervisor/conf.d/ && \
  chown -R ${USER_NAME}:${GROUP_NAME} $PHP_INI_DIR/conf.d/ && \
  touch /var/run/nginx.pid && \
  chown -R $USER_NAME:$USER_NAME /var/cache/nginx && \
  chown -R $USER_NAME:$USER_NAME /var/lib/nginx/ && \
  chown -R $USER_NAME:$USER_NAME /var/run/nginx.pid && \
  chown -R $USER_NAME:$USER_NAME /var/log/supervisor && \
  chown -R $USER_NAME:$USER_NAME /etc/nginx/nginx.conf && \
  chown -R $USER_NAME:$USER_NAME /etc/nginx/conf.d/ && \
  chown -R ${USER_NAME}:${GROUP_NAME} /tmp

#USER ${USER_NAME}
EXPOSE 8080
ENTRYPOINT ["entrypoint.sh"]
