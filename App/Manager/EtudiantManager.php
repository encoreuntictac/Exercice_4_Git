<?php
namespace App\Demo\Manager;

use Faker\Factory;
use App\Demo\Entity\Personne;
use App\Demo\Manager\TableManager;
use App\Demo\Manager\PersonneManager;

use PDO;

class EtudiantManager extends TableManager {
    protected $id;
    
    public function addEtudiant($datas)
    {
        $req = $this->getPdo()->prepare('INSERT INTO personne SET nom = :nom, prenom = :prenom, adresse = :adresse, codepostal = :codepostal, status = :status');
        $req->execute([
            'nom'           => $datas->getNom(),
            'prenom'        => $datas->getPrenom(),
            'adresse'       => $datas->getAdresse(),
            'codepostal'    => $datas->getCodePostal(),
            'status'        => 'Etudiant',
        ]);

        $req = $this->getPdo()->prepare('INSERT INTO etudiant SET nom = :nom, prenom = :prenom, niveau = :niveau, id = :id, date = :date');
        $req->execute([
            'nom'           => $datas->getNom(),
            'prenom'        => $datas->getPrenom(),
            'niveau'        => $datas->getNiveau(),
            'id'            => $this->getPdo()->lastInsertId(),
            'date'          => date('Y-m-d H:i:s')
        ]);
        
        $this->id = $this->getPdo()->lastInsertId();
    }

    public function addCour($datas)
    {
        foreach ($datas->getCour() as  &$value) {
            $req = $this->getPdo()->prepare("SELECT id_cour FROM cours WHERE titre_nom= :titre_nom");
            $req->execute([
                'titre_nom' => $value
            ]);
            $datas = $req->fetch(PDO::FETCH_OBJ);

            $req = $this->getPdo()->prepare('INSERT INTO `cours suivis` SET id_etudiant = :id_etudiant, id_cour = :id_cour');
            $req->execute([
                'id_etudiant'    => $this->id,
                'id_cour'        => $datas->id_cour,
            ]);
        }
    }
}

// SELECT * 
// FROM personne
// INNER JOIN etudiant ON personne.id = etudiant.id_pers
// INNER JOIN categorie ON personne.status = categorie.statut; */