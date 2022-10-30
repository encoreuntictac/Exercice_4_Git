<?php 
namespace app\Demo\Manager;

use App\Demo\Manager\ConnexionManager;

class TableManager {

    public static function deleteTable($tableName)
    {

        $sql = <<<____SQL
        DROP TABLE IF EXISTS $tableName
        ____SQL;
        
        return $sql;

    }

    public static function deleteTableAll()
    {
        ConnexionManager::getDb()->exec(self::deleteTable('personne'));
        ConnexionManager::getDb()->exec(self::deleteTable('categorie'));
        ConnexionManager::getDb()->exec(self::deleteTable('etudiant'));
        ConnexionManager::getDb()->exec(self::deleteTable('cours'));
        ConnexionManager::getDb()->exec(self::deleteTable("`cours suivis`"));
    }

    public static function createTable($tableName)
    {

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

        return $sql;
        
    }

    public static function createTableAll()
    {
        ConnexionManager::getDb()->exec(self::createTable('personne'));
        ConnexionManager::getDb()->exec(self::createTable('categorie'));
        ConnexionManager::getDb()->exec(self::createTable('etudiant'));
        ConnexionManager::getDb()->exec(self::createTable('cours'));
        ConnexionManager::getDb()->exec(self::createTable('cours suivis'));
    }

    public static function addCateg(...$statut)
    {
        foreach ($statut as $value) {
            $sql = ConnexionManager::getDb()->prepare('INSERT INTO `categorie` SET statut = :statut');
            $sql->execute(['statut' => $value]);
        }
    }

    public static function addCour(...$cour)
    {
        foreach ($cour as $value) {
            $sql = ConnexionManager::getDb()->prepare('INSERT INTO `cours` SET titre_nom = :titre_nom');
            $sql->execute(['titre_nom' => $value]);
        }
    }
}
