# Multi-stage build for static site with PHP support
FROM php:8.2-fpm-alpine AS php-base
WORKDIR /app
COPY . .
RUN docker-php-ext-install opcache && \
    echo "opcache.enable=1" > /usr/local/etc/php/conf.d/opcache.ini

FROM nginx:1.27-alpine AS production
WORKDIR /usr/share/nginx/html

# Copy static files
COPY --from=php-base /app .

# Copy nginx config for PHP routing
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Expose port
EXPOSE 80

# Health check
HEALTHCHECK --interval=30s --timeout=3s --start-period=5s --retries=3 \
  CMD wget --no-verbose --tries=1 --spider http://localhost/ || exit 1

# Start nginx
CMD ["nginx", "-g", "daemon off;"]
