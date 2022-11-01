<?php 
namespace app\Demo\Manager;

use App\Demo\Manager\ConnexionManager;
use PDO;
use App\Demo\Entity\Personne;
class TableManager {

    public static function deleteTable($tableName)
    {
        foreach ($tableName as $val)
        {
            $sql = <<<____SQL
            DROP TABLE IF EXISTS $val
            ____SQL;
            
            ConnexionManager::getDb()->exec($sql);
        }
    }

    public static function createTable($tableName)
    {
        foreach ($tableName as $key => $val)
        {
            switch ($val) {
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
    
                case 'enseignant' :
                    $sql = <<<____SQL
                        CREATE TABLE IF NOT EXISTS `enseignant` (
                            `id_enseignant` int NOT NULL AUTO_INCREMENT,
                            `nom` varchar(255) NOT NULL,
                            `prenom` varchar(255) NOT NULL,
                            `anciennete` int NOT NULL,
                            `id` int NOT NULL,
                            `date` datetime NOT NULL,
                            PRIMARY KEY (`id_enseignant`)
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
    
                case '`cours listes`' :
                    $sql = <<<____SQL
                        CREATE TABLE IF NOT EXISTS `cours listes` ( 
                            `id_cour` int NOT NULL AUTO_INCREMENT,
                            `titre_nom` varchar(255) NOT NULL,
                            PRIMARY KEY (`id_cour`)
                        ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
                ____SQL;
                    break;
    
                case '`cours donnees`' :
                    $sql = <<<____SQL
                        CREATE TABLE IF NOT EXISTS `cours donnees` (
                            `id_enseignant` int NOT NULL,
                            `id_cour` int NOT NULL
                        ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
                ____SQL;
                    break;
                case '`cours suivis`' :
                    $sql = <<<____SQL
                        CREATE TABLE IF NOT EXISTS `cours suivis` (
                            `id_etudiant` int NOT NULL,
                            `id_cour` int NOT NULL
                        ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
                ____SQL;
                    break;
            }
            ConnexionManager::getDb()->exec($sql);
        }
    }

    public static function addCateg(...$statut)
    {
        foreach ($statut as $value) {
            $sql = ConnexionManager::getDb()->prepare('INSERT INTO `categorie` SET statut = :statut');
            $sql->execute(['statut' => $value]);
        }
    }

    public static function addLessonList(...$cour)
    {
        foreach ($cour as $value) {
            $sql = ConnexionManager::getDb()->prepare('INSERT INTO `cours listes` SET titre_nom = :titre_nom');
            $sql->execute(['titre_nom' => $value]);
        }
    }
}
