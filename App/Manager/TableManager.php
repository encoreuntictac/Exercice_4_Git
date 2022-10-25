<?php 
namespace app\Demo\Manager;

use App\Demo\Manager\PersonneManager;

use PDO;

class TableManager {

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host ='localhost')
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

    public function createTable($table) {
        $req = $this->getPdo()->prepare('CREATE TABLE IF NOT EXISTS :tableName');
    }

    static function getConnexion($tableName){

        $mysql = 'mysql:host=localhost;dbname='.$tableName.'';
        return         
            $pdo = new PDO($mysql, 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}

/* $sql = <<<____SQL
     CREATE TABLE IF NOT EXISTS `ticket_hist` (
       `tid` int(11) NOT NULL,
       `trqform` varchar(40) NOT NULL,
       `trsform` varchar(40) NOT NULL,
       `tgen` datetime NOT NULL,
       `tterm` datetime,
       `tstatus` tinyint(1) NOT NULL
     ) ENGINE=ARCHIVE COMMENT='ticket archive';
____SQL; */

/* $sql = <<<____SQL
DROP TABLE IF EXISTS ticket_hist
____SQL;
$result = $pdo->exec($sql); */