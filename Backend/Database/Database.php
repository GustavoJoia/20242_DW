<?php
namespace App\Backend\Database;
use PDO;

class Database{

    public static function connectMysql(){

        $host = 'localhost:3306';
        $db = 'my_database';
        $user = 'root';
        $password = 'root';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        try {

            $pdo = new PDO($dsn, $user, $password,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
            return $pdo;
            
        } catch (PDOException $e) {
            return ['erro'=>$e->getMessage()];
        }

    }

    public static function connectSqlite(){

        $path = 'sqlite_db.sqlite';

        try {
            $pdo = new PDO("sqlite:$path");
            return $pdo;
        } catch (PDOException $e) {
            return ['erro'=>$e->getMessage()];
        }

    }
    
}