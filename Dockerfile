# syntax=docker/dockerfile:1
#
# Production image for Home_Agency (Laravel 13 + Vite/Tailwind).
# Built by Coolify from the GitHub repo. Serves via nginx + php-fpm on port 8080.

# ---------- 1) Build front-end assets (Vite + Tailwind) ----------
FROM node:20-alpine AS assets
WORKDIR /app
# Full context so Tailwind can scan blade templates for used classes
COPY . .
RUN npm ci && npm run build

# ---------- 2) Install PHP dependencies (no dev) ----------
FROM composer:2 AS vendor
WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install \
    --no-dev --no-scripts --prefer-dist --no-interaction --optimize-autoloader

# ---------- 3) Runtime: nginx + php-fpm (production-ready Laravel image) ----------
FROM serversideup/php:8.4-fpm-nginx

# Run migrations / config-cache automatically on container start.
# (serversideup automations — safe defaults for a single-instance deploy.)
ENV AUTORUN_ENABLED=true \
    PHP_OPCACHE_ENABLE=1 \
    APP_ENV=production \
    APP_DEBUG=false

WORKDIR /var/www/html

# App source
COPY --chown=www-data:www-data . .
# Vendor + compiled assets from the build stages
COPY --from=vendor --chown=www-data:www-data /app/vendor ./vendor
COPY --from=assets --chown=www-data:www-data /app/public/build ./public/build

# Make sure Laravel's writable dirs are writable
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 8080