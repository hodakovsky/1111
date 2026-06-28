# Build the Nuxt frontend
FROM node:20-alpine AS frontend-build
WORKDIR /app/frontend
COPY frontend/package*.json frontend/tsconfig.json frontend/nuxt.config.ts ./
RUN npm install
COPY frontend .
RUN npm run generate

# Build the Laravel backend
FROM php:8.4-apache
RUN apt-get update && apt-get install -y libzip-dev zip unzip git libonig-dev libpq-dev && rm -rf /var/lib/apt/lists/*
RUN docker-php-ext-install pdo_mysql pdo_pgsql mbstring
RUN a2enmod rewrite
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY backend/composer.json backend/composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist
COPY backend .
COPY --from=frontend-build /app/frontend/.output/public ./public
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache /var/www/html/public
EXPOSE 80
CMD ["apache2-foreground"]
