FROM php:7.4-fpm-alpine

RUN apk upgrade --update && \
  apk --no-cache add icu-dev autoconf make g++ gcc curl gnupg unixodbc-dev

# mssql
RUN curl -O https://download.microsoft.com/download/e/4/e/e4e67866-dffd-428c-aac7-8d28ddafb39b/msodbcsql17_17.6.1.1-1_amd64.apk \
    && curl -O https://download.microsoft.com/download/e/4/e/e4e67866-dffd-428c-aac7-8d28ddafb39b/mssql-tools_17.6.1.1-1_amd64.apk \
    && curl https://packages.microsoft.com/keys/microsoft.asc  | gpg --import - \
    && apk add --allow-untrusted msodbcsql17_17.6.1.1-1_amd64.apk \
    && apk add --allow-untrusted mssql-tools_17.6.1.1-1_amd64.apk

RUN docker-php-ext-install pdo \
    && pecl install sqlsrv pdo_sqlsrv \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv

# composer
RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

# app
COPY . /var/www/html
WORKDIR /var/www/html
RUN composer install \
    && cp .env.example .env \
    && php artisan key:generate \
    && chmod -R a+w storage/ bootstrap/cache
