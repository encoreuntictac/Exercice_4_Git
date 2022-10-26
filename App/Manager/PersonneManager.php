<?php
namespace App\Demo\Manager;

use Faker\Factory;
use App\Demo\Entity\Personne;
use App\Demo\Manager\TableManager;
use PDO;

class PersonneManager extends TableManager {

    public function addPersonne($nom, $prenom, $adresse, $codepostal, $categ_id){
        $req = $this->getPdo()->prepare('INSERT INTO personne SET nom = :nom, prenom = :prenom, adresse = :adresse, codepostal = :codepostal, categ_id = :categ_id');
        // if(is_int($categ_id)) {

        // }
        $req->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'adresse' => $adresse,
            'codepostal' => $codepostal,
            'categ_id' => $categ_id
        ]);
    }
}