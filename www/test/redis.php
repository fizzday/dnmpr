<?php
/**
 * Created by PhpStorm.
 * User: fizz
 * Date: 2019-05-08
 * Time: 18:47
 */

$redis = new Redis();

$redis->connect('redis', 6379); //连接Redis

$redis->auth('123456'); //密码验证

$redis->select(1);//选择数据库2

$redis->set( "testKey" , "Hello Redis2"); //设置测试key

echo $redis->get("testKey");//输出value
