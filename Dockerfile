FROM wyveo/nginx-php-fpm:latest

COPY . /usr/share/nginx/html
COPY nginx.conf /etc/nginx/conf.d/default.conf

WORKDIR /usr/share/nginx/html

RUN ln -s public html
RUN apty update; \
    apty install vim -y

EXPOSE 8000