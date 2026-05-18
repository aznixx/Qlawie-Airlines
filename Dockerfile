FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

WORKDIR /var/www/html

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build

RUN rm -rf node_modules

EXPOSE 80