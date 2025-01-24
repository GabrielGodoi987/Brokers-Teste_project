FROM php:8.2-cli

WORKDIR /usr/src/app

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip \
    && rm -rf /var/lib/apt/lists/*


COPY composer*.json ./

RUN composer install --no-interaction --prefer-dist

COPY . .

EXPOSE 8080

CMD ["php", "./src/index.php"]