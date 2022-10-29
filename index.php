<?php 
require_once 'vendor/autoload.php';

use Faker\Factory;

use App\Demo\Entity\Personne;
use App\Demo\Entity\Enseignant;
use App\Demo\Entity\Etudiant;
use App\Demo\Manager\TableManager;
use App\Demo\Manager\TestManager;
use App\Demo\Manager\PersonneManager;
use App\Demo\Manager\CategorieManager;
use App\Demo\Manager\EtudiantManager;
use App\Demo\Manager\CoursManager;

$db = new TableManager('poo_php');


$sql = <<<____SQL
DROP TABLE IF EXISTS personne
____SQL;
$db->getPdo()->exec($sql);

$sql = <<<____SQL
DROP TABLE IF EXISTS categorie
____SQL;
$db->getPdo()->exec($sql);

$sql = <<<____SQL
DROP TABLE IF EXISTS etudiant
____SQL;
$db->getPdo()->exec($sql);

$sql = <<<____SQL
DROP TABLE IF EXISTS cours
____SQL;
$db->getPdo()->exec($sql);

$sql = <<<____SQL
DROP TABLE IF EXISTS `cours suivis`
____SQL;
$db->getPdo()->exec($sql);

$sql = <<<____SQL
    CREATE TABLE IF NOT EXISTS `personne` (
        `id` int NOT NULL AUTO_INCREMENT,
        `nom` varchar(255) DEFAULT NULL,
        `prenom` varchar(255) DEFAULT NULL,
        `adresse` varchar(255) DEFAULT NULL,
        `codepostal` int NOT NULL,
        `status` varchar(255) NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb3;
____SQL;

$db->getPdo()->exec($sql);

$sql = <<<____SQL
    CREATE TABLE IF NOT EXISTS `categorie` (
        `id_categ` int NOT NULL AUTO_INCREMENT,
        `statut` varchar(255) NOT NULL,
        PRIMARY KEY (`id_categ`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;  
____SQL;

$db->getPdo()->exec($sql);

CategorieManager::addCateg('Enseignant');
CategorieManager::addCateg('Etudiant');


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

$db->getPdo()->exec($sql);

$sql = <<<____SQL
    CREATE TABLE IF NOT EXISTS `cours` (
        `id_cour` int NOT NULL AUTO_INCREMENT,
        `titre_nom` varchar(255) NOT NULL,
        PRIMARY KEY (`id_cour`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
____SQL;

$db->getPdo()->exec($sql);

CoursManager::addCour('Math');
CoursManager::addCour('Français');
CoursManager::addCour('Anglais');
CoursManager::addCour('Science');
CoursManager::addCour('Economie');

$sql = <<<____SQL
    CREATE TABLE IF NOT EXISTS `cours suivis` (
        `id_etudiant` int NOT NULL,
        `id_cour` int NOT NULL
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
____SQL;

$db->getPdo()->exec($sql);

// var_dump($faker->dateTime());
// var_dump(new DateTime(is_string(time())));

// $faker = Faker\Factory::create();
// var_dump($faker->numberBetween(1, 3));





$faker = Factory::create();

$etudiant1 = new EtudiantManager('poo_php');
$db = new Etudiant($faker);
$etudiant1->addEtudiant($db);
// $etudiant1->addCour();

$etudiant2 = new EtudiantManager('poo_php');
$db = new Etudiant($faker);
$etudiant2->addEtudiant($db);
$etudiant2->addCour();




$title = 'Exercice 4';
require 'elements/header.php';
?>

<h1>Exercice 4 Héritage + Exceptions</h1>

<div>
    <pre>

    </pre>
</div>

<?php require 'elements/footer.php'; ?>