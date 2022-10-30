<?php
namespace App\Demo\Manager;

// use Faker\Factory;
// use App\Demo\Manager\TableManager;
// use App\Demo\Entity\Personne;
// use PDO;

class PersonneManager {






    
/* 
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

    }

    public function readPersonne($statement = false)
    {
        $bd = new TableManager('poo_php');

        if (is_int($statement)) {

            $req = $bd->getPdo()->prepare('SELECT * FROM personne WHERE id= :id');
            $req->execute([
                'id'           => $statement
            ]);
        } else {
            $req = $bd->getPdo()->query('SELECT * FROM personne ORDER BY id DESC limit 1');
        }


        if ($statement) {

            $datas = $req->fetch(PDO::FETCH_OBJ);
        } else {

            $datas = $req->fetchAll(PDO::FETCH_OBJ);
        }

        return $datas;
    }
     */
}