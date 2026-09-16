<?php
class Database {
    private static ?PDO $instance = null;

    private function __construct() {} // Prevents direct instantiation
    private function __clone() {} // Prevents cloning

    public static function getInstance(): PDO {
        if (self::$instance === null) {
            $host = 'localhost';
            $db = 'canopus';
            $user = 'app_user';
            $pass = 'Sgdm2026!Torneo';
            $charset = 'utf8mb4';
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            self::$instance = new PDO($dsn, $user, $pass, $options);
        }
        return self::$instance;
    }
}
?>
