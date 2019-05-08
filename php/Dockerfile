FROM php:7.3-fpm-alpine3.9

# ########### 设置时区 ##############
ENV TZ Asia/Shanghai
# 下载时区文件(tzdata), 设置时区
RUN apk add --no-cache tzdata && \
#    cp /usr/share/zoneinfo/${TZ} /etc/localtime && \
#    echo ${TZ} > /etc/timezone
    ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

