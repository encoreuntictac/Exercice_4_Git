<?php 
require_once 'vendor/autoload.php';

use App\Demo\Manager\TableManager;
use App\Demo\Manager\EntityManager;;

use App\Demo\Manager\ConnexionManager;
use Faker\Factory;

use App\Demo\Entity\Personne;
use App\Demo\Entity\Enseignant;
use App\Demo\Entity\Etudiant;

use App\Demo\Manager\PersonneManager;

use App\Demo\Manager\EtudiantManager;


// * Supprimer les tables pour les réinitialiser
TableManager::deleteTableAll();

// * Initialisation des tables
TableManager::createTableAll();

// * Déclaration de la DB catégorie
TableManager::addCateg(
    'Enseignant', 
    'Etudiant'
);

// * Déclaration de la DB cours
TableManager::addCour(
    'Math',
    'Français',
    'Anglais',
    'Science',
    'Histoire',
    'Géographie',
    'Economie'
);


EntityManager::addNewEtudiant([
    // 'etudiant' => 2,
    'enseignant' => 5

]);





$title = 'Exercice 4';
require 'elements/header.php';
?>

<h1>Exercice 4 Héritage + Exceptions</h1>

<div>
    <pre>

    </pre>
</div>

<?php require 'elements/footer.php'; ?>