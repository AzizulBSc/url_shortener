FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
  git \
  zip \
  curl \
  libzip-dev \
  zlib1g-dev \
  unzip \
  libonig-dev \
  graphviz \
  libsodium-dev \
  libxml2-dev \
  libcurl4-openssl-dev \
  libfreetype6-dev \
  libjpeg62-turbo-dev \
  libwebp-dev \
  libpng-dev \
  libicu-dev \
  g++ \
  make

# Install GD extension
RUN docker-php-ext-configure gd \
  --with-freetype \
  --with-jpeg \
  --with-webp \
  && docker-php-ext-install -j$(nproc) gd

# Install necessary PHP extensions
RUN docker-php-ext-install pdo_mysql \
  && docker-php-ext-install zip \
  && docker-php-ext-install dom \
  && docker-php-ext-install curl \
  && docker-php-ext-install mbstring \
  && docker-php-ext-install intl \
  && docker-php-ext-install bcmath \
  && docker-php-ext-install sodium \
  && docker-php-ext-install opcache

# Install Node.js and npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
  && apt-get install -y nodejs

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP and Node.js dependencies
RUN composer install --no-interaction --prefer-dist \
  && npm install

# Set permissions (adjust as needed)
RUN chown -R www-data:www-data /var/www/html/storage \
  && chmod -R 755 /var/www/html/storage

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]
