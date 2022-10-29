<?php 
namespace app\Demo\Manager;

use App\Demo\Manager\PersonneManager;
use App\Demo\Entity\Personne;
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

    public static function getConnexion($tableName){
        
        $mysql = 'mysql:host=localhost;dbname='.$tableName.'';
        return         
            $pdo = new PDO($mysql, 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function deleteTable($tableName)
    {
        $db = new TableManager('poo_php');

        $sql = <<<____SQL
        DROP TABLE IF EXISTS $tableName
        ____SQL;
        $db->getPdo()->exec($sql);
    }

    public static function createTable($tableName)
    {
        $db = new TableManager('poo_php');

        switch ($tableName) {
            case 'personne' :
                $sql = <<<____SQL
                    CREATE TABLE IF NOT EXISTS `personne` (
                        `id` int NOT NULL AUTO_INCREMENT,
                        `nom` varchar(255) DEFAULT NULL,
                        `prenom` varchar(255) DEFAULT NULL,
                        `adresse` varchar(255) DEFAULT NULL,
                        `codepostal` int NOT NULL,
                        `status` varchar(255) NOT NULL,
                        PRIMARY KEY (`id`)
                    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
            ____SQL;
                break;
            
            case 'categorie' :
                $sql = <<<____SQL
                    CREATE TABLE IF NOT EXISTS `categorie` (
                        `id_categ` int NOT NULL AUTO_INCREMENT,
                        `statut` varchar(255) NOT NULL,
                        PRIMARY KEY (`id_categ`)
                    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;  
            ____SQL;
                break;

            case 'etudiant' :
                $sql = <<<____SQL
                    CREATE TABLE IF NOT EXISTS `etudiant` (
                        `id_etudiant` int NOT NULL AUTO_INCREMENT,
                        `nom` varchar(255) DEFAULT NULL,
                        `prenom` varchar(255) DEFAULT NULL,
                        `niveau` varchar(255) NOT NULL,
                        `id` int NOT NULL,
                        `date` datetime NOT NULL,
                        PRIMARY KEY (`id_etudiant`)
                    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
            ____SQL;
                break;

            case 'cours' :
                $sql = <<<____SQL
                    CREATE TABLE IF NOT EXISTS `cours` ( 
                        `id_cour` int NOT NULL AUTO_INCREMENT,
                        `titre_nom` varchar(255) NOT NULL,
                        PRIMARY KEY (`id_cour`)
                    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
            ____SQL;
                break;

            case 'cours suivis' :
                $sql = <<<____SQL
                    CREATE TABLE IF NOT EXISTS `cours suivis` (
                        `id_etudiant` int NOT NULL,
                        `id_cour` int NOT NULL
                    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
            ____SQL;
                break;
        }

        $db->getPdo()->exec($sql);
    }
}
