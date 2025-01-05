<?php

namespace App\Config;
use PDO ;
use PDOException ;

class Database
{
    private static $connection = null;

    public static function getConnection()
    {
        if (self::$connection === null) {
            try {
                $host = 'localhost';
                $dbname = 'crud-mvc';
                $username = 'root';
                $password = '';
                $charset = 'utf8mb4';

                $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

                self::$connection = new PDO($dsn, $username, $password);
            } catch (PDOException $e) {
                throw new PDOException("Database connection failed: " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}
