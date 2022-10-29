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



// Suprime les tables pour les renitialiser
TableManager::deleteTable('personne');
TableManager::deleteTable('categorie');
TableManager::deleteTable('etudiant');
TableManager::deleteTable('cours');
TableManager::deleteTable("`cours suivis`");


// Créaction des tables
TableManager::createTable('personne');
TableManager::createTable('categorie');
TableManager::createTable('etudiant');
TableManager::createTable('cours');
TableManager::createTable('cours suivis');


// Déclaration de la bd categorie
CategorieManager::addCateg('Enseignant');
CategorieManager::addCateg('Etudiant');


// Déclaration de la bd cours
CoursManager::addCour('Math');
CoursManager::addCour('Français');
CoursManager::addCour('Anglais');
CoursManager::addCour('Science');
CoursManager::addCour('Histoire');
CoursManager::addCour('Géographie');
CoursManager::addCour('Economie');


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
$etudiant5->addCour($db);







$title = 'Exercice 4';
require 'elements/header.php';
?>

<h1>Exercice 4 Héritage + Exceptions</h1>

<div>
    <pre>

    </pre>
</div>

<?php require 'elements/footer.php'; ?>