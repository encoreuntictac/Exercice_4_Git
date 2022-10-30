<?php
namespace App\Demo\Manager;

use App\Demo\Manager\ConnexionManager;
use App\Demo\Entity\Personne;
use App\Demo\Entity\Etudiant;

class EntityManager
{
    public static function createPersonne()
    {
        $personne = Personne::newPersonne();
        self::addPersonne($personne);
    }

    public static function createEtudiant()
    {
        $personne = Etudiant::newEtudiant();
        $sql = ConnexionManager::getDb()->prepare('INSERT INTO personne SET nom = :nom, prenom = :prenom, adresse = :adresse, codepostal = :codepostal, status = :status');
        $sql->execute([
            'nom'           => $personne->getNom(),
            'prenom'        => $personne->getPrenom(),
            'adresse'       => $personne->getAdresse(),
            'codepostal'    => $personne->getCodePostal(),
            'status'        => 'undefine'
        ]);

        $id_personne = ConnexionManager::getDb()->lastInsertId();

        $sql = ConnexionManager::getDb()->prepare('INSERT INTO etudiant SET nom = :nom, prenom = :prenom, niveau = :niveau, id = :id, date = :date');
        $sql->execute([
            'nom'           => $personne->getNom(),
            'prenom'        => $personne->getPrenom(),
            'niveau'        => $personne->getNiveau(),
            'id'            => $id_personne,
            'date'          => date('Y-m-d H:i:s')
        ]);
    }


    public function addPersonne($personne)
    {
        $sql = ConnexionManager::getDb()->prepare('INSERT INTO personne SET nom = :nom, prenom = :prenom, adresse = :adresse, codepostal = :codepostal, status = :status');
        $sql->execute([
            'nom'           => $personne->getNom(),
            'prenom'        => $personne->getPrenom(),
            'adresse'       => $personne->getAdresse(),
            'codepostal'    => $personne->getCodePostal(),
            'status'        => 'undefine'
        ]);
        return $personne;
    }
}