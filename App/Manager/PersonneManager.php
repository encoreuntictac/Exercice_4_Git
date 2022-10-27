<?php
namespace App\Demo\Manager;

use Faker\Factory;
use App\Demo\Manager\TableManager;
use App\Demo\Entity\Personne;
use PDO;

class PersonneManager {

    public function addPersonne($personne, $status)
    {
        $bd = new TableManager('poo_php');

        $req = $bd->getPdo()->prepare('INSERT INTO personne SET nom = :nom, prenom = :prenom, adresse = :adresse, codepostal = :codepostal, status = :status');

        $req->execute([
            'nom'           => $personne->lastName(),
            'prenom'        => $personne->firstName(),
            'adresse'       => $personne->address(),
            'codepostal'    => $personne->postcode(),
            'status'        => $status
        ]);

        // $bd = new TableManager('poo_php');
        // $req = $bd->getPdo()->query('SELECT * FROM personne');
        // $resultat = $req->fetchAll(PDO::FETCH_CLASS, 'Personne');
        // return $resultat;
    }

    public function test() {
        $bd = new TableManager('poo_php');
        $req = $bd->getPdo()->query('SELECT * FROM personne');
        $resultat = $req->fetchAll(PDO::FETCH_OBJ);
        return $resultat;
    }
}