ARG PHP_VERSION="8"
ARG COMPOSER_VERSION="lts"
FROM composer:${COMPOSER_VERSION} AS composer_stage
FROM php:${PHP_VERSION}-cli-alpine
RUN apk add --update --no-cache \
    bash
COPY --from=composer_stage /usr/bin/composer /usr/local/bin/composer
