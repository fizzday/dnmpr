FROM php:7.3-fpm-alpine3.9

# 作者
LABEL maintainer="fizzday <fizzday@yeah.net>" \
        Description="php7.3 alpine3.9"

# ########### 变量 ##############
ENV TZ Asia/Shanghai
ARG PHPREDIS_VERSION=4.3.0

# ########### 安装并设置时区 ##############
# 下载时区文件(tzdata), 设置时区
RUN apk add --no-cache tzdata && \
    ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# ######### 安装mysql扩展 ##########
RUN /usr/local/bin/docker-php-ext-install pdo_mysql

# ########## redis扩展 ###########
#redis官方php扩展地址: https://github.com/phpredis/phpredis/archive/${PHPREDIS_VERSION}.tar.gz
RUN curl -L -o /tmp/phpredis.tar.gz http://download.hk.fizzday.net/phpredis_4.3.0.tar.gz && \
    tar xfz /tmp/phpredis.tar.gz && \
    mkdir -p /usr/src/php/ext && \
    mv phpredis-${PHPREDIS_VERSION} /usr/src/php/ext/redis && \
    /usr/local/bin/docker-php-ext-install redis && \
    rm -rf /tmp/phpredis.tar.gz && \
    rm -rf /usr/src/php #如果这段不加构建的镜像将大100M

# ########## gd扩展 ###########
RUN apk add --no-cache freetype libpng libjpeg-turbo freetype-dev libpng-dev libjpeg-turbo-dev && \
  docker-php-ext-configure gd \
    --with-gd \
    --with-freetype-dir=/usr/include/ \
    --with-png-dir=/usr/include/ \
    --with-jpeg-dir=/usr/include/ && \
  NPROC=$(grep -c ^processor /proc/cpuinfo 2>/dev/null || 1) && \
  docker-php-ext-install -j${NPROC} gd && \
  apk del --no-cache freetype-dev libpng-dev libjpeg-turbo-dev

EXPOSE 9000

