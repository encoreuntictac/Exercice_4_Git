<?php
namespace App\Demo\Manager;

use PDO;

class ConnexionManager {
    
    const DB_NAME = 'poo_php';
    const DB_USER = 'root';
    const DB_PASS = '';
    const DB_HOST = 'localhost';

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;
    

    private static $db;


    public function __construct(string $db_name,string $db_user,string $db_pass,string $db_host)
    {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    public function getPdo()
    {
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:dbname=poo_php;host=localhost', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public static function getDb() {
        if (self::$db === null) {
            self::$db = new self(self::DB_NAME, self::DB_USER, self::DB_PASS, self::DB_HOST);
        }
        return self::$db->getPdo();
    }

}