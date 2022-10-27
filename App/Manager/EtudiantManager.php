<?php
namespace App\Demo\Manager;

use Faker\Factory;
use App\Demo\Entity\Personne;
use App\Demo\Manager\TableManager;
use App\Demo\Manager\PersonneManager;
require_once '../Entity/Personne.php';
use PDO;

class EtudiantManager {

    public function addEtudiant($personne,  $status)
    {
        PersonneManager::addPersonne($personne,  $status);
        $last_id = TableManager::getConnexion('poo_php')->lastInsertId();
        $id_etudiant = 'Eleve_' . $last_id;
        $time = time();

        $req = TableManager::getConnexion('poo_php')->prepare('INSERT INTO etudiant SET id_etudiant = :id_etudiant, niveau = :niveau, id = :id, date = :date');
        
        $req->execute([
            'id_etudiant'   => $id_etudiant,
            'niveau'        => $personne->numberBetween(1, 3),
            'id'            => $last_id,
            'date'          => $time
        ]);

    }
}


// SELECT * 
// FROM personne
// INNER JOIN etudiant ON personne.id = etudiant.id_pers
// INNER JOIN categorie ON personne.status = categorie.statut;