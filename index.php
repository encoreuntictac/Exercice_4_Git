<?php 
require_once 'vendor/autoload.php';

use App\Demo\Manager\TableManager;
use App\Demo\Manager\EntityManager;;
use App\Demo\Entity\Affichage;

// * Nom des tables
$tab = [
    'personne',
    'categorie',
    'enseignant',
    'etudiant',
    "`cours listes`",
    "`cours donnees`",
    "`cours suivis`"
];

// * Supprimer les tables pour les réinitialiser
TableManager::deleteTable($tab);

// * Initialisation des tables
TableManager::createTable($tab);

// * Insertion des données dans la DB catégorie
TableManager::addCateg(
    'Enseignant', 
    'Etudiant'
);

// * Insertion des données dans la DB cours listes
TableManager::addLessonList(
    'Math',
    'Français',
    'Anglais',
    'Science',
    'Histoire',
    'Géographie',
    'Economie'
);

// * Création & insertion des données dans la DB 
EntityManager::addNewPerson([
    'enseignant' => 3,
    'etudiant' => 10

]);

$title = 'Exercice 4';
require 'elements/header.php';
?>
<h1>Exercice 4 Héritage + Exceptions</h1>
<h2>Afficher listes professeurs</h2>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Date</th>
            <th>Ancienneté</th>
            <th>Cours Données</th>
        </tr>
    </thead>

    <?php foreach (Affichage::getListTeacher() as $item): ?>
        <tr>
            <td><?= $item->getNom() ?></td>
            <td><?= $item->getPrenom() ?></td>
            <td><?= $item->getAdresse() ?></td>
            <td><?= $item->getDate() ?></td>
            <td><?= $item->getAnciennete() ?> années</td>
            <td>
                <?php foreach (Affichage::getLessonTeacher($item->getId()) as $lesson): ?>
                    <?= $lesson->getCoursDonnes() ?>,
                <?php endforeach ?>
            </td>
        </tr>
    <?php endforeach ?>

</table>

<h2>Afficher listes d'élèves</h2>
<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Date d'inscription</th>
            <th>Niveau</th>
            <th>Cours suivies</th>
        </tr>
    </thead>

    <?php foreach (Affichage::getListStudent() as $item): ?>
        <tr>
            <td><?= $item->getNom() ?></td>
            <td><?= $item->getPrenom() ?></td>
            <td><?= $item->getAdresse() ?></td>
            <td><?= $item->getDate() ?></td>
            <td><?= ucfirst($item->getNiveau()) ?></td>
            <td>
                <?php foreach (Affichage::getLessonStudent($item->getId()) as $lesson): ?>
                    <?= $lesson->getCoursSuivis() ?>,
                <?php endforeach ?>
            </td>
        </tr>
    <?php endforeach ?>
</table>
<?php require 'elements/footer.php'; ?>