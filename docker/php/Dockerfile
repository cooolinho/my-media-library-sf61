FROM php:8.1-fpm-buster

# ARGs from docker-compose.yml
ARG TIMEZONE
ARG NODE_VERSION
ARG NVM_VERSION
ARG XDEBUG_VERSION

# copy php.ini
COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/docker-php-config.ini

# add aliases to .bashrc
COPY ./symfony/aliases /tmp/aliases
RUN cat /tmp/aliases | sed 's/\r//' >> ~/.bashrc

# install dependencies
RUN apt-get update && \
    apt-get install -y \
      vim \
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
      acl

# Install PHP extensions
RUN docker-php-ext-configure gd --with-jpeg --with-freetype 
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    zip \
    xsl \
    gd \
    intl \
    opcache \
    exif \
    mbstring

# Set timezone
RUN ln -snf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime &&  \
    echo ${TIMEZONE} > /etc/timezone &&  \
    printf '[PHP]\ndate.timezone = "%s"\n', ${TIMEZONE} > /usr/local/etc/php/conf.d/tzone.ini && \
    "date"

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Xdebug
RUN pecl install xdebug-$XDEBUG_VERSION &&  \
    docker-php-ext-enable xdebug

# NVM
RUN mkdir /usr/local/nvm
ENV NVM_DIR /usr/local/nvm
RUN curl https://raw.githubusercontent.com/nvm-sh/nvm/v$NVM_VERSION/install.sh | bash && \
    . $NVM_DIR/nvm.sh &&  \
    nvm install $NODE_VERSION &&  \
    nvm alias default $NODE_VERSION &&  \
    nvm use default &&  \
    npm install -g yarn

# Set environment variables
ENV NODE_PATH $NVM_DIR/v$NODE_VERSION/lib/node_modules
ENV PATH $NVM_DIR/versions/node/v$NODE_VERSION/bin:$PATH

# create directories
RUN mkdir -p /var/www/bundles
RUN mkdir -p /var/www/symfony

# set working directory
WORKDIR /var/www/symfony

# Expose port 9000 and start php-fpm server
EXPOSE 9000
