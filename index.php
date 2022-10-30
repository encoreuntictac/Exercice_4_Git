<?php 
require_once 'vendor/autoload.php';

use App\Demo\Manager\TableManager;
use Faker\Factory;
use App\Demo\Manager\EntityManager;;

use App\Demo\Manager\ConnexionManager;


use App\Demo\Entity\Personne;
use App\Demo\Entity\Enseignant;
use App\Demo\Entity\Etudiant;

use App\Demo\Manager\PersonneManager;

use App\Demo\Manager\EtudiantManager;




/* 
// Initialisation des Etudiants 
$faker = Factory::create();

$etudiant1 = new EtudiantManager('poo_php');
$db = new Etudiant($faker);
$etudiant1->addEtudiant($db);
$etudiant1->addCour($db);

$etudiant2 = new EtudiantManager('poo_php');
$db = new Etudiant($faker);
$etudiant2->addEtudiant($db);
$etudiant2->addCour($db);

$etudiant3 = new EtudiantManager('poo_php');
$db = new Etudiant($faker);
$etudiant3->addEtudiant($db);
$etudiant3->addCour($db);

$etudiant4 = new EtudiantManager('poo_php');
$db = new Etudiant($faker);
$etudiant4->addEtudiant($db);
$etudiant4->addCour($db);

$etudiant5 = new EtudiantManager('poo_php');
$db = new Etudiant($faker);
$etudiant5->addEtudiant($db);
$etudiant5->addCour($db); */


// * Supprimer les tables pour les réinitialiser
TableManager::deleteTableAll();

//* Initialisation des tables
TableManager::createTableAll();

//* Déclaration de la DB catégorie
TableManager::addCateg(
    'Enseignant', 
    'Etudiant'
);

//* Déclaration de la DB cours
TableManager::addCour(
    'Math',
    'Français',
    'Anglais',
    'Science',
    'Histoire',
    'Géographie',
    'Economie'
);

$faker = Factory::create();



// EntityManager::createPersonne();

// ! Extends est bon 
// var_dump(Personne::newPersonne());
// var_dump(Etudiant::newPersonne());
// var_dump(Enseignant::newPersonne());



var_dump(EntityManager::createEtudiant());
var_dump(EntityManager::createEtudiant());
var_dump('elev' . 1);

$title = 'Exercice 4';
require 'elements/header.php';
?>

<h1>Exercice 4 Héritage + Exceptions</h1>

<div>
    <pre>

    </pre>
</div>

<?php require 'elements/footer.php'; ?>