FROM php:8.2-fpm

# set your user name, ex: user=bernardo
ARG USERNAME=www-data
ARG HOST_UID=1000
ARG HOST_GID=1000
ENV APP_HOME /var/www
ENV TZ=America/Porto_Velho

# Install system dependencies
RUN apt-get update && apt-get install -y \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libmariadb-dev \
    supervisor \
    cron \
    nginx \
    zip \
    unzip

RUN apt-get update && apt-get install -y tzdata
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd sockets opcache

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN rm -rf /etc/nginx/sites-enabled/* && rm -rf /etc/nginx/sites-available/*
COPY ./docker/nginx/sites.conf /etc/nginx/sites-enabled/default.conf
COPY ./docker/nginx/error.html /var/www/html/error.html

# Create system user to run Composer and Artisan Commands
# create document root, fix permissions for www-data user and change owner to www-data
RUN mkdir -p $APP_HOME/public && \
    mkdir -p /home/$USERNAME && chown $USERNAME:$USERNAME /home/$USERNAME \
    && usermod -o -u $HOST_UID $USERNAME -d /home/$USERNAME \
    && groupmod -o -g $HOST_GID $USERNAME \
    && chown -R ${USERNAME}:${USERNAME} $APP_HOME

# Install redis
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

RUN chmod +x /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1

# add supervisor
RUN mkdir -p /var/log/supervisor
COPY --chown=root:root ./docker/general/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY --chown=root:crontab ./docker/general/cron /var/spool/cron/crontabs/root
RUN chmod 0600 /var/spool/cron/crontabs/root

# Set working directory
WORKDIR $APP_HOME

# Copy custom configurations PHP
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini
# set working directory

USER ${USERNAME}


USER root

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]
#docker compose -f docker-compose.dev.yml exec -u www-data app bash
