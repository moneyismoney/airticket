FROM php:8.1-fpm

RUN docker-php-ext-install mysqli

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHPUnit
RUN apt-get update && apt-get install -y wget \
    && wget https://phar.phpunit.de/phpunit-10.phar \
    && chmod +x phpunit-10.phar \
    && mv phpunit-10.phar /usr/local/bin/phpunit