## 镜像
基于 `php:7.3-alpine3.9` 添加了时区, pdo_mysql扩展, gd扩展, redis扩展.  
新打包的镜像地址为: `registry.cn-hangzhou.aliyuncs.com/dnmpr/php`, 此镜像有两个tag, 分别为: `5.6-alpine3.8`, `7.3-alpine3.9`

## 获取镜像
```bash
docker pull registry.cn-hangzhou.aliyuncs.com/dnmpr/php:7.3-alpine3.9
```

## Dockerfile 中使用
```bash
FROM registry.cn-hangzhou.aliyuncs.com/dnmpr/php:7.3-alpine3.9
...
```
这里引用的是 php 7.3 版本, 如果使用 php 5.6 版本, 则更改tag为 `5.6-alpine3.8`即可

## docker-compose 中使用
```bash
...
image: "registry.cn-hangzhou.aliyuncs.com/dnmpr/php:7.3-alpine3.9"
...
```
这里引用的是 php 7.3 版本, 如果使用 php 5.6 版本, 则更改tag为 `5.6-alpine3.8`即可

## 测试
```bash
$ docker run -it --rm registry.cn-hangzhou.aliyuncs.com/dnmpr/php:7.3-alpine3.9 php -v

PHP 7.3.5 (cli) (built: May  4 2019 00:58:41) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.3.5, Copyright (c) 1998-2018 Zend Technologies
```
