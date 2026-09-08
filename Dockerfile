# Stage 1: Build frontend assets with Vite
FROM node:20-alpine AS frontend-builder
WORKDIR /app
COPY package*.json ./
RUN npm ci || npm install
COPY . .
RUN npm run build

# Stage 2: PHP 8.2 & Nginx Application Server
FROM php:8.2-fpm-alpine

# Install system dependencies & PHP extensions required by Laravel 11 and PostgreSQL
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    zip \
    libzip-dev \
    sqlite-dev \
    icu-dev \
    oniguruma-dev \
    postgresql-dev \
    libxml2-dev \
    openssl-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_pgsql pdo_sqlite gd zip mbstring intl bcmath opcache xml tokenizer

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy application code
COPY . .
COPY --from=frontend-builder /app/public/build ./public/build

# Install PHP dependencies for production
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Configure directory permissions and entrypoint script
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod +x /var/www/html/docker/entrypoint.sh

# Copy Nginx & Supervisor configurations
COPY docker/nginx.conf /etc/nginx/http.d/default.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

ENTRYPOINT ["/var/www/html/docker/entrypoint.sh"]
