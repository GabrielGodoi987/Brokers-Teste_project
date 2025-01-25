FROM php:8.2-cli AS deps

WORKDIR /app

COPY composer.json composer.lock ./

RUN apt-get update && apt-get install -y unzip \
&& docker-php-ext-install pdo_mysql \
&& curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
&& composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader


FROM php:8.2-apache

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" \
    && a2enmod rewrite

COPY --from=deps /app/vendor/ ./vendor/

COPY ./src ./src

EXPOSE 8080

CMD ["apache2-foreground"]
