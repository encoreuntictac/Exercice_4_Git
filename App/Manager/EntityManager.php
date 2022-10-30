<?php
namespace App\Demo\Manager;

use App\Demo\Manager\ConnexionManager;
use App\Demo\Entity\Personne;
use App\Demo\Entity\Etudiant;

use PDO;

class EntityManager
{
    private static $personne;


    public static function addNewEtudiant($tab)
    {
        if (self::$personne === null) {
            self::$personne = new self();
        }

        if (array_key_exists('etudiant', $tab)) {
            $i = 0;
            while ($i < $tab['etudiant']) {
                $datas = Etudiant::newEtudiant();
    
                $id = self::$personne->addPersonne($datas);

                $datas->setId(ConnexionManager::getDb()->lastInsertId());

                self::$personne->addEtudiant($datas);
                
                self::$personne->addCour($datas);
                $i++;
            }
        }
    }

    public function addPersonne($datas)
    {
        $sql = ConnexionManager::getDb()->prepare('INSERT INTO personne SET nom = :nom, prenom = :prenom, adresse = :adresse, codepostal = :codepostal, status = :status');
        $sql->execute([
            'nom'           => $datas->getNom(),
            'prenom'        => $datas->getPrenom(),
            'adresse'       => $datas->getAdresse(),
            'codepostal'    => $datas->getCodePostal(),
            'status'        => 'undefine'
        ]);
    }

    public function addEtudiant($datas)
    {
        $sql = ConnexionManager::getDb()->prepare('INSERT INTO etudiant SET nom = :nom, prenom = :prenom, niveau = :niveau, id = :id, date = :date');
        $sql->execute([
            'nom'           => $datas->getNom(),
            'prenom'        => $datas->getPrenom(),
            'niveau'        => $datas->getNiveau(),
            'id'            => $datas->getId(),
            'date'          => date('Y-m-d H:i:s')
        ]);
    }

    public function addCour($datas)
    {
        foreach ($datas->getCour() as  $value) {
            $sql = ConnexionManager::getDb()->prepare("SELECT id_cour FROM cours WHERE titre_nom= :titre_nom");
            $sql->execute([
                'titre_nom' => $value
            ]);
            $data_id = $sql->fetch(PDO::FETCH_OBJ);

            $sql = ConnexionManager::getDb()->prepare('INSERT INTO `cours suivis` SET id_etudiant = :id_etudiant, id_cour = :id_cour');
            $sql->execute([
                'id_etudiant'    => $datas->getId(),
                'id_cour'        => $data_id->id_cour,
            ]);
        }
    }
}