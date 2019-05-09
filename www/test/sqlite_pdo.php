<?php
/**
 * Created by PhpStorm.
 * User: fizz
 * Date: 2019-05-08
 * Time: 16:08
 */
$dsn = 'sqlite:sqlite.db';
try {
    $dbh = new PDO($dsn);
    echo 'Create Db ok';
    //建表
    $dbh->exec("CREATE TABLE users(id integer,name varchar(255))");
    echo 'Create Table users ok<BR>';
    $dbh->exec("INSERT INTO users values(1,'users.com')");
    echo 'Insert Data ok<BR>';
    $dbh->beginTransaction();
    $sth = $dbh->prepare('SELECT * FROM users');
    $sth->execute();
    //获取结果
    $result = $sth->fetchAll();
    print_r($result);
    $dsn = null;
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    $dsn = null;
}
// 释放资源
unset($dbh);