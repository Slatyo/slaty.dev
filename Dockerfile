# slaty.dev — Production Dockerfile
# Multi-stage: build assets → slim PHP-FPM + nginx runtime

# =============================================================================
# Stage 1: Build frontend assets
# =============================================================================
FROM node:22-alpine AS assets

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci --no-audit --no-fund

COPY vite.config.js postcss.config.js tailwind.config.js ./
COPY resources/ resources/
COPY app/ app/

RUN npm run build

# =============================================================================
# Stage 2: Install PHP dependencies
# =============================================================================
FROM composer:2 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install \
    --no-dev \
    --no-interaction \
    --no-scripts \
    --no-autoloader \
    --prefer-dist

COPY . .
RUN composer dump-autoload --optimize --no-dev

# =============================================================================
# Stage 3: Production runtime (PHP-FPM + nginx)
# =============================================================================
FROM php:8.4-fpm-alpine

RUN apk add --no-cache \
        nginx \
        postgresql-dev \
    && docker-php-ext-install \
        bcmath \
        pdo_pgsql \
        opcache \
    && rm -rf /var/cache/apk/*

# PHP production config
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY <<'EOF' /usr/local/etc/php/conf.d/99-production.ini
opcache.enable=1
opcache.memory_consumption=128
opcache.interned_strings_buffer=16
opcache.max_accelerated_files=10000
opcache.validate_timestamps=0
expose_php=Off
memory_limit=128M
upload_max_filesize=10M
post_max_size=10M
EOF

# nginx config
COPY <<'NGINX' /etc/nginx/http.d/default.conf
server {
    listen 80;
    server_name _;
    root /var/www/html/public;
    index index.php;

    charset utf-8;
    client_max_body_size 10M;

    location /build/ {
        expires 1y;
        access_log off;
        add_header Cache-Control "public, immutable";
    }

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass 127.0.0.1:9000;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known) {
        deny all;
    }
}
NGINX

RUN sed -i 's/^user = .*/user = www-data/' /usr/local/etc/php-fpm.d/www.conf \
    && sed -i 's/^group = .*/group = www-data/' /usr/local/etc/php-fpm.d/www.conf

WORKDIR /var/www/html

COPY --from=vendor /app/vendor vendor/
COPY . .
COPY --from=assets /app/public/build public/build/

RUN rm -rf node_modules tests docker .env .env.example \
    docker-compose.yml phpunit.xml AGENTS.md CLAUDE.md GOAL.md README.md \
    && rm -f bootstrap/cache/packages.php bootstrap/cache/services.php

RUN mkdir -p storage/framework/{cache,sessions,views} \
    storage/logs \
    bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache

COPY <<'ENTRY' /usr/local/bin/start.sh
#!/bin/sh
set -e

cd /var/www/html

php artisan package:discover --ansi 2>/dev/null || true
php artisan storage:link 2>/dev/null || true
php artisan migrate --force --no-interaction 2>/dev/null || true
php artisan optimize

php-fpm -D
exec nginx -g "daemon off;"
ENTRY
RUN chmod +x /usr/local/bin/start.sh

EXPOSE 80

CMD ["/usr/local/bin/start.sh"]
