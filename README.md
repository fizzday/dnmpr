# dnmp
docker-compose build nginx, redis, php, mysql on alpine linux with diffrent versions.  
you can add other version with Simple configuration.  

## usage
### 1. install docker
do it yourself
### 2. install docker-compose
do it yourself
### 3. install dnmp
```bash
# download dnmp pro
git clone https://github.com/fizzday/dnmp.git

# you can choose version in .env file
cd dnmp && cp env.example .env

# boot background and auto build images
docker-compose up -d
```

## view images and containers
```bash
docker images

docker ps
```

## directories
```bash
$ tree
.
├── LICENSE
├── README.md
├── conf
│   ├── mysql
│   │   └── my.cnf
│   ├── nginx
│   │   ├── conf.d
│   │   │   └── default.conf
│   │   └── nginx.conf
│   ├── php
│   │   ├── php-fpm.conf
│   │   ├── php.ini
│   │   └── www.conf
│   └── redis
│       └── redis.conf
├── docker-compose.yml
├── env.example
├── log
│   ├── mysql
│   ├── nginx
│   ├── php
│   └── redis
├── mysql
│   ├── 5.7
│   │   └── Dockerfile
│   └── 8.0
│       └── Dockerfile
├── nginx
│   └── 1.16
│       └── Dockerfile
├── php
│   ├── 5.6
│   │   └── Dockerfile
│   └── 7.3
│       └── Dockerfile
├── redis
│   ├── 4.0
│   │   └── Dockerfile
│   └── 5.0
│       └── Dockerfile
└── www
    ├── index.php
    ├── test
    │   ├── mysql.php
    │   ├── redis.php
    │   ├── sqlite.db
    │   ├── sqlite.php
    │   └── sqlite_pdo.php
    └── test.html
```

## add redis server versions myself
### 1. make version dir and touch Dockerfile
```bash
cd dnmp
mkdir -p redis/4.0 && cd redis/4.0
touch Dockerfile
```
### 2. fil Dockerfile with content
```bash
FROM redis:4.0-alpine3.9

# 作者
LABEL maintainer="fizzday <fizzday@yeah.net>" \
        Description="redis4.0 alpine3.9"
```
### 3. change .env redis_version virable
```bash
...
redis_version=4.0
...
```
### 4. rebuild docker redis images
```bash
cd dnmp
docker-compose down
docker rmi dnmp_redis:latest
docker-compose up
```
### 5. now, let's check the redis version
```bash
# login redis server
docker exec -it dredis sh
# check redis version
/data $ redis-server -v
Redis server v=4.0.14 sha=00000000:0 malloc=jemalloc-4.0.3 bits=64 build=357cb9239225a524
/data $ 
```

wow, we have add a new server ourselves (^_^)