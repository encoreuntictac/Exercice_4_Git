<?php
namespace App\Demo\Entity;


use PDO;
use App\Demo\Manager\ConnexionManager;

/**
 * Class Affichage
 * 
 * Récupère les donnés pour les afficher 
 * 
 * @author Parasmo Marco 
 */
class Affichage 
{
    private $id;
    private $status;
    private $nom;
    private $prenom;
    private $adresse;
    private $date;
    private $anciennete;
    private $coursDonnes;
    private $niveau;
    private $coursSuivis;
    
    /**
     * Récupère la Liste des professeurs
     * 
     * @return object Instance la class Affichage
     * 
     * @author Parasmo Marco 
     */
    public static function getListTeacher()
    {
        $statement = (
            "SELECT personne.status, personne.nom, personne.prenom, CONCAT(personne.adresse, ', ', personne.codepostal) AS adresse, enseignant.date, enseignant.anciennete, enseignant.id_enseignant AS id
            FROM personne
            INNER JOIN enseignant 
            ON personne.id = enseignant.id"
        );

        $sql = ConnexionManager::getDb()->query($statement);
        $datas = $sql->fetchAll(PDO::FETCH_CLASS, __CLASS__);

        return $datas;
    }
    
    /**
     * Récupère la liste des cours données 
     * 
     * @param  mixed $attributes Id du professeurs
     * 
     * @return object
     * 
     * @author Parasmo Marco 
     */
    public static function getLessonTeacher($attributes)
    {
        $statement = (
            "SELECT `cours listes`.`titre_nom` AS coursDonnes
            FROM `cours listes`
            INNER JOIN `cours donnees`
            ON `cours listes`.`id_cour` = `cours donnees`.`id_cour`
            WHERE `cours donnees`.`id_enseignant` = :id"
        );

        $sql = ConnexionManager::getDb()->prepare($statement);
        $sql->execute(['id' => $attributes]);
        $sql->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        $datas = $sql->fetchAll();
        return $datas;
    }
    
    /**
     * Récupère la Liste des étudiants    
     * 
     * @return object
     * 
     * @author Parasmo Marco 
     */
    public static function getListStudent()
    {
        $statement = (
            "SELECT personne.status, personne.nom, personne.prenom, CONCAT(personne.adresse, ', ', personne.codepostal) AS adresse, etudiant.date, etudiant.niveau, etudiant.id_etudiant AS id
            FROM personne
            INNER JOIN etudiant
            ON personne.id = etudiant.id"
        );

        $sql = ConnexionManager::getDb()->query($statement);
        $datas = $sql->fetchAll(PDO::FETCH_CLASS, __CLASS__);
        return $datas;
    }
    
    /**
     * Récupère la liste des cours suivies   
     * 
     * @return object
     * 
     * @author Parasmo Marco 
     */
    public static function getLessonStudent($attributes)
    {
        $statement = (
            "SELECT `cours listes`.`titre_nom` AS coursSuivis
            FROM `cours listes`
            INNER JOIN `cours suivis`
            ON `cours listes`.`id_cour` = `cours suivis`.`id_cour`
            WHERE `cours suivis`.`id_etudiant`= :id"
            );

        $sql = ConnexionManager::getDb()->prepare($statement);
        $sql->execute(['id' => $attributes]);
        $sql->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        $datas = $sql->fetchAll();
        return $datas;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getAnciennete()
    {
        return $this->anciennete;
    }

    public function getCoursDonnes()
    {
        return $this->coursDonnes;
    }

    public function getNiveau()
    {
        return $this->niveau;
    }

    public function getCoursSuivis()
    {
        return $this->coursSuivis;
    }
}