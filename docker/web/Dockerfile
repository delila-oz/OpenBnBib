FROM php:7.3.2-apache

# Installation weiterer PHP-Pakete
RUN apt-get update -yqq && \
    apt-get install -y zip unzip && \
    apt-get install -y nano && \
    apt-get install -y libzip-dev libpq-dev && \
    apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libjpeg-dev && \
    a2enmod rewrite && \
  # Installation von PHP-Erweiterungen
    docker-php-ext-install pdo_pgsql && \
    docker-php-ext-install pgsql && \
    docker-php-ext-configure zip --with-libzip && \
    docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/  && \
    docker-php-ext-install -j$(nproc) gd  && \
    docker-php-ext-install zip && \
    rm -rf /var/lib/apt/lists/*

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

# Erweiterung der PHP-Einstellungen
COPY default.conf /etc/apache2/sites-enabled/000-default.conf

WORKDIR /var/www/app

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]

EXPOSE 80
