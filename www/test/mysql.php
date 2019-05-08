<?php
/**
 * Created by PhpStorm.
 * User: fizz
 * Date: 2019-05-08
 * Time: 11:52
 */

$mysql_conf = array(
    'host'    => 'mysql:3306',
    'db'      => 'mysql',
    'db_user' => 'root',
    'db_pwd'  => '123456',
);

try {
    $dbh = new PDO("mysql:host=" . $mysql_conf['host'] .
        ";dbname=" . $mysql_conf['db'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);//创建一个pdo对象

    $sql =  "select * from user where User=?";
    $stmt=$dbh->prepare($sql);
    $stmt->execute(["root"]);
    while ($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<pre>";
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
