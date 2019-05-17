#!/bin/bash

nginx -s stop

killall php-fpm

docker-compose start