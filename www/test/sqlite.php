<?php
/**
 * Created by PhpStorm.
 * User: fizz
 * Date: 2019-05-08
 * Time: 16:05
 */
class SQLiteDB extends SQLite3
{
    function __construct()
    {
        $this->open('sqlite.db');
    }
}
$db = new SQLiteDB();
if(!$db){
    echo $db->lastErrorMsg();
} else {
    echo "Yes, Opened database successfully\n";
}