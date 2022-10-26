<?php 
require_once 'vendor/autoload.php';

use Faker\Factory;

use App\Demo\Entity\Personne;
use App\Demo\Entity\Enseignant;
use App\Demo\Entity\Etudiant;
use App\Demo\Manager\TableManager;
use App\Demo\Manager\CategorieManager;
use App\Demo\Manager\EtudiantManager;
use App\Demo\Manager\PersonneManager;


/* Instanciation de la class PersonneManager */

$db = new TableManager('poo_php');
$db = new CategorieManager('poo_php');
var_dump($db->getPdo());

$sql = <<<____SQL
DROP TABLE IF EXISTS personne
____SQL;

$db->getPdo()->exec($sql);

$sql = <<<____SQL
DROP TABLE IF EXISTS categorie
____SQL;

$db->getPdo()->exec($sql);

$sql = <<<____SQL
DROP TABLE IF EXISTS cours
____SQL;

$db->getPdo()->exec($sql);

$sql = <<<____SQL
    CREATE TABLE IF NOT EXISTS `personne` (
        `id` int NOT NULL AUTO_INCREMENT,
        `nom` varchar(255) DEFAULT NULL,
        `prenom` varchar(255) DEFAULT NULL,
        `adresse` varchar(255) DEFAULT NULL,
        `codepostal` int NOT NULL,
        `status` int NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
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

$sql = <<<____SQL
    CREATE TABLE IF NOT EXISTS `cours` (
        `id_cour` int NOT NULL AUTO_INCREMENT,
        `titre` varchar(255) NOT NULL,
        PRIMARY KEY (`id_cour`)
    ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
____SQL;

// $db->getPdo()->exec($sql);

 
$db->addCateg('Enseignant');
$db->addCateg('Etudiant');

$db = new PersonneManager('poo_php');
$db->addPersonne(Factory::create());
$db->addPersonne(Factory::create());




// var_dump($faker->randomElement(['goku', 'vegeta']));

$db = new Etudiant('poo_php');
var_dump($db);

$title = 'Exercice 4';
require 'elements/header.php';
?>

<h1>Exercice 4 Héritage + Exceptions</h1>

<div>
    <pre>
        <?php var_dump($db->addEtudiant(Factory::create())) ?>
    </pre>
</div>

<?php require 'elements/footer.php'; ?>