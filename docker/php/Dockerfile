FROM php:8.1-fpm-buster

ARG TIMEZONE
ARG NODE_VERSION
ARG NVM_VERSION
ARG XDEBUG_VERSION
ARG DEV_USER
ARG DEV_USER_UID

COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/docker-php-config.ini

RUN apt-get update && apt-get install -y \
    gnupg \
    g++ \
    procps \
    openssl \
    git \
    unzip \
    zlib1g-dev \
    libzip-dev \
    libfreetype6-dev \
    libpng-dev \
    libjpeg-dev \
    libicu-dev  \
    libonig-dev \
    libxslt1-dev \
    acl \
    && echo 'alias sf="php bin/console"' >> ~/.bashrc

RUN docker-php-ext-configure gd --with-jpeg --with-freetype 

RUN docker-php-ext-install \
    pdo pdo_mysql zip xsl gd intl opcache exif mbstring

# Set timezone
RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime && echo ${TIMEZONE} > /etc/timezone \
    && printf '[PHP]\ndate.timezone = "%s"\n', ${TIMEZONE} > /usr/local/etc/php/conf.d/tzone.ini \
    && "date"

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Xdebug
RUN pecl install xdebug-$XDEBUG_VERSION && docker-php-ext-enable xdebug

# NVM
RUN mkdir /usr/local/nvm
ENV NVM_DIR /usr/local/nvm
RUN curl https://raw.githubusercontent.com/nvm-sh/nvm/v$NVM_VERSION/install.sh | bash \
    && . $NVM_DIR/nvm.sh \
    && nvm install $NODE_VERSION \
    && nvm alias default $NODE_VERSION \
    && nvm use default
ENV NODE_PATH $NVM_DIR/v$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

RUN mkdir -p /var/www/bundles

COPY ./symfony /var/www/symfony
COPY ./bundles /var/www/bundles

# Kopiere das Skript und mache es ausführbar
COPY ./docker/php/start.sh /usr/local/bin/start.sh
RUN chmod +x /usr/local/bin/start.sh
# Lade wait-for-it.sh direkt herunter und mache es ausführbar
RUN curl -sS https://raw.githubusercontent.com/vishnubob/wait-for-it/master/wait-for-it.sh -o /usr/local/bin/wait-for-it.sh \
    && chmod +x /usr/local/bin/wait-for-it.sh

WORKDIR /var/www/symfony

# install dependencies
RUN echo "➡️ Installing dependencies 'composer install --ignore-platform-reqs'"
RUN composer install --ignore-platform-reqs
RUN echo "✅ Installing dependencies complete"

# build assets
RUN echo "➡️ Building assets 'npm run build'"
RUN npm run build
RUN echo "✅ Building assets Complete"

# install assets
RUN echo "➡️ Installing assets 'php bin/console assets:install'"
RUN php bin/console assets:install
RUN echo "✅ Installing assets complete"

# Exponiere Port 9000 für PHP-FPM
EXPOSE 9000

# Setze den Startbefehl
CMD ["/usr/local/bin/start.sh"]
