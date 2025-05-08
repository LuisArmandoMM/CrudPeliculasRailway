
FROM php:8.2-apache
<<<<<<< Updated upstream
RUN docker-php-ext-install pdo pdo_pgsql

RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_pgsql pgsql

=======
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql
>>>>>>> Stashed changes
COPY . /var/www/html/
EXPOSE 80
