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

EXPOSE 9000

