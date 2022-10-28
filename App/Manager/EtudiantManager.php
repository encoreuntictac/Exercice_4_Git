<?php
namespace App\Demo\Manager;

use Faker\Factory;
use App\Demo\Entity\Personne;
use App\Demo\Manager\TableManager;
use App\Demo\Manager\PersonneManager;

use PDO;

class EtudiantManager {
    private $id;

    public function addEtudiant($personne,  $status)
    {
        $db = new PersonneManager();
        $db->addPersonne($personne,  $status);
        $datas = $db->readPersonne(true);

        // var_dump($datas);
        // $personne = new Personne($datas->id, $datas->nom, $datas->prenom, $datas->adresse, $datas->codepostal, $status);
        // var_dump($personne);

        $bd = new TableManager('poo_php');
        $time = time();
        $req = $bd->getPdo()->prepare('INSERT INTO etudiant SET nom = :nom, prenom = :prenom, niveau = :niveau, id = :id, date = :date');

        $req->execute([
            'nom'           => $datas->nom,
            'prenom'        => $datas->prenom,
            'niveau'        => $personne->numberBetween(1, 3),
            'id'            => $datas->id,
            'date'          => $time
        ]);


        $req = $bd->getPdo()->query('SELECT * FROM etudiant ORDER BY id_etudiant DESC limit 1');
        $datas = $req->fetch(PDO::FETCH_OBJ);
        $this->id = $datas->id_etudiant;
        // var_dump($this->id);
    }

    public function addCour()
    {
        $bd = new TableManager('poo_php');
        $req = $bd->getPdo()->prepare('INSERT INTO `cours suivis` SET nom = :nom, prenom = :prenom');

        $req->execute([
            'nom'           => $datas->nom,
            'prenom'        => $datas->prenom
        ]);
    }

    public function getId()
    {
        return $this->id;
    }
}


// SELECT * 
// FROM personne
// INNER JOIN etudiant ON personne.id = etudiant.id_pers
// INNER JOIN categorie ON personne.status = categorie.statut;