FROM ubuntu:latest

RUN apt-get update && apt-get -y upgrade && DEBIAN_FRONTEND=noninteractive apt-get -y install \
    apache2 zip curl git

RUN DEBIAN_FRONTEND=noninteractive apt-get install -y php7.2 php7.2-fpm php7.2-bcmath php7.2-zip php-mysql php7.2-mysql php-mbstring php-gettext libapache2-mod-php7.2 php-xml

RUN a2enmod php7.2  
RUN a2enmod rewrite
RUN service apache2 restart

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN cd /var/www && git clone https://github.com/mrcrmn/project-3.git

RUN cd /var/www/project-3 && composer install --no-dev
ADD env-example /var/www/project-3/.env

RUN chmod -R 777 /var/www/project-3/storage
RUN php /var/www/project-3/artisan key:generate
# RUN php /var/www/project-3/artisan migrate
# RUN php /var/www/project-3/artisan db:seed

# Manually set up the apache environment variables
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

EXPOSE 80

ADD apache-config.conf /etc/apache2/sites-enabled/000-default.conf

CMD /usr/sbin/apache2ctl -D FOREGROUND