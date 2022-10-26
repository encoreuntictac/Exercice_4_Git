<?php
namespace App\Demo\Manager;

use Faker\Factory;
use App\Demo\Entity\Personne;
use App\Demo\Manager\TableManager;
use PDO;

class PersonneManager extends TableManager {

    public function addPersonne($personne)
    {

        $req = $this->getPdo()->prepare('INSERT INTO personne SET nom = :nom, prenom = :prenom, adresse = :adresse, codepostal = :codepostal, status = :status');

        $req->execute([
            'nom' => $personne->lastName(),
            'prenom' => $personne->firstName(),
            'adresse' => $personne->address(),
            'codepostal' => $personne->postcode(),
            'status' => $personne->randomElement(['Etudiant', 'Enseigant'])
        ]);
    }
}