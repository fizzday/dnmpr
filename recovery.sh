#!/bin/bash

docker-compose stop

nginx

/usr/local/opt/php56/sbin/php-fpm --fpm-config /usr/local/etc/php/5.6/php-fpm.conf