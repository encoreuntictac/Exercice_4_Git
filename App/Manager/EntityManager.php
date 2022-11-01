<?php
namespace App\Demo\Manager;

use App\Demo\Manager\ConnexionManager;
use App\Demo\Entity\Enseignant;
use App\Demo\Entity\Etudiant;

use PDO;

class EntityManager
{
    private static $personne;

    public static function addNewPerson($tab)
    {
        self::$personne = self::$personne ?? new self();

        foreach ($tab as $key => $val) {
            $i = 0;

            while ($i < $val)
            {
                $datas = ($key === 'enseignant') ? Enseignant::newEnseignant(): Etudiant::newEtudiant();
                $typeCour = ($datas->getStatus() === 'Enseignant') ? "`cours donnees`": "`cours suivis`";
                
                self::$personne->addPerson($datas);
                
                self::$personne->addLesson($typeCour, $datas);

                $i++;
            }
        }
    }

    public function addPerson($datas)
    {
        $sql = ConnexionManager::getDb()->prepare('INSERT INTO personne SET nom = :nom, prenom = :prenom, adresse = :adresse, codepostal = :codepostal, status = :status');
        $sql->execute([
            'nom'           => $datas->getNom(),
            'prenom'        => $datas->getPrenom(),
            'adresse'       => $datas->getAdresse(),
            'codepostal'    => $datas->getCodePostal(),
            'status'        => $datas->getStatus()
        ]);

        $datas->setId(ConnexionManager::getDb()->lastInsertId());
        $champs = ($datas->getStatus() === 'Enseignant') ? 'anciennete': 'niveau';
        $champsRslt = $champs === 'anciennete' ? $datas->getAnciennete()                    : $datas->getLvl();
        $champsDate = $champs === 'anciennete' ? $datas->getDebut()->format('Y/m/d H:i')    : date('Y-m-d H:i:s');

        $sql = ConnexionManager::getDb()->prepare("INSERT INTO {$datas->getStatus()} SET nom = :nom, prenom = :prenom,  {$champs} = :{$champs}, id = :id, date = :date");
        $sql->execute([
            'nom'           => $datas->getNom(),
            'prenom'        => $datas->getPrenom(),
            "{$champs}"     => $champsRslt,
            'id'            => $datas->getId(),
            'date'          => $champsDate
        ]);
        $datas->setId(ConnexionManager::getDb()->lastInsertId());
    }

    public function addLesson($tableName, $datas)
    {
        $champs = ($tableName === "`cours donnees`") ? 'id_enseignant': 'id_etudiant';

        foreach ($datas->getListLesson() as  $value) {
            $sql = ConnexionManager::getDb()->prepare("SELECT id_cour FROM `cours listes` WHERE titre_nom= :titre_nom");
            $sql->execute([
                'titre_nom' => $value
            ]);
            
            $data_id = $sql->fetch(PDO::FETCH_OBJ);

            $sql = ConnexionManager::getDb()->prepare("INSERT INTO {$tableName} SET {$champs} = :{$champs}, id_cour = :id_cour ");
            $sql->execute([
                "{$champs}" => $datas->getId(),
                'id_cour'   => $data_id->id_cour
            ]);
        }
    }
}

