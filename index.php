<?php 
require_once 'vendor/autoload.php';

use App\Demo\Entity\Personne;
use App\Demo\Entity\Enseignant;
use App\Demo\Entity\Etudiant;
use App\Demo\Manager\TableManager;
use App\Demo\Manager\PersonneManager;


/* Instanciation de la class PersonneManager */

$db = new TableManager('poo_php');

$sql = <<<____SQL
DROP TABLE IF EXISTS personne
____SQL;

$db->getPdo()->exec($sql);

$sql = <<<____SQL
     CREATE TABLE IF NOT EXISTS `personne` (
        `id` int NOT NULL AUTO_INCREMENT,
        `nom` varchar(255) DEFAULT NULL,
        `prenom` varchar(255) DEFAULT NULL,
        `adresse` varchar(255) DEFAULT NULL,
        `codepostal` varchar(255) DEFAULT NULL,
        `pays` varchar(255) DEFAULT NULL,
        PRIMARY KEY (`id`)
     ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
____SQL;

$db->getPdo()->exec($sql);

$title = 'Exercice 4';
require 'elements/header.php';
?>

<h1>Exercice 4 Héritage + Exceptions</h1>

<div>
    <pre>
   
    </pre>
</div>

<?php require 'elements/footer.php'; ?>