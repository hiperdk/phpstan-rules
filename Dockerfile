ARG PHP_VERSION
FROM php:${PHP_VERSION}-cli-alpine
RUN apk add --update --no-cache \
    bash
COPY --from=composer:lts /usr/bin/composer /usr/local/bin/composer
