<?php
namespace App\Demo\Entity;

use Faker\Factory;

/**
 * @author Parasmo Marco 
 * 
 * Class Personne
 */
class Personne 
{
    protected $nom;
    protected $prenom;
    protected $adresse;
    protected $codepostal;

    public function __construct(object $datas)
    {
        $this->nom          = $datas->lastName();
        $this->prenom       = $datas->firstName();
        $this->adresse      = $datas->address();
        $this->codepostal   = $datas->postcode();
    }

    public static function newPersonne()
    {
        $faker = Factory::create();
        return new Personne($faker);
    }

    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function getCodePostal()
    {
        return $this->codepostal;
    }
    public function setCodePostal($codepostal)
    {
        $this->codepostal = $codepostal;
    }
}