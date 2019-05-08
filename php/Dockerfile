FROM php:7.3-fpm-alpine3.9

# 作者
LABEL maintainer="fizzday <fizzday@yeah.net>" \
        Description="php7.3 alpine3.9 with none timezone"

# ########### 设置时区 ##############
ENV TZ Asia/Shanghai
# 下载时区文件(tzdata), 设置时区
RUN apk add --no-cache tzdata && \
    ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# ######### 安装mysql扩展 ##########
RUN /usr/local/bin/docker-php-ext-install pdo_mysql

# ########## redis扩展 ###########
RUN curl -L -o /tmp/redis.tar.gz http://download.hk.fizzday.net/phpredis_4.3.0.tar.gz && \
RUN tar xfz /tmp/phpredis_4.3.0.tar.gz && \
    rm -r /tmp/phpredis_4.3.0.tar.gz && \
    mkdir -p /usr/src/php/ext && \
    mv phpredis_4.3.0 /usr/src/php/ext/redis
RUN /usr/local/bin/docker-php-ext-install redis

EXPOSE 9000

