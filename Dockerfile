# ========= Image de base =========
FROM dunglas/frankenphp:1-php8.3-alpine AS base
WORKDIR /app

# Extensions PHP nécessaires au projet
RUN apk add --no-cache \
    icu-dev oniguruma-dev libzip-dev zlib-dev libpng libpng-dev git bash \
 && docker-php-ext-configure intl \
 && docker-php-ext-install -j$(nproc) intl pdo_mysql opcache \
 && apk del libpng-dev || true

# Xdebug optionnel
ARG INSTALL_XDEBUG=false
RUN if [ "$INSTALL_XDEBUG" = "true" ]; then \
      apk add --no-cache $PHPIZE_DEPS \
      && pecl install xdebug \
      && docker-php-ext-enable xdebug ; \
    fi

# Configuration Caddy
COPY ./Caddyfile /etc/caddy/Caddyfile

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# ========= Image DEV =========
FROM base AS dev
ENV APP_ENV=dev
EXPOSE 8080
CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]
