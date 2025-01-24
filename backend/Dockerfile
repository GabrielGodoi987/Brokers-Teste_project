FROM php:8.2-cli

WORKDIR /app

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip \
    libpq-dev \
    && docker-php-ext-install zip pdo pdo_pgsql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY composer*.json composer.lock ./
RUN composer install --no-cache --no-scripts

COPY . .

EXPOSE 8080

CMD ["tail", "-f", "/dev/null"]