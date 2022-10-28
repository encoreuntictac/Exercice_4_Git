<?php
namespace App\Demo\Entity;

/**
 * @author Parasmo Marco 
 * 
 * Class Personne
 */
class Personne 
{
    protected $id;
    protected $nom;
    protected $prenom;
    protected $adresse;
    protected $codepostal;
    protected $status;

    public function __construct(int $id, string $nom ='',string $prenom ='',string  $adresse ='',int $codepostal = null,string  $status = '')
    {
        $this->id           = $id;
        $this->nom          = $nom;
        $this->prenom       = $prenom;
        $this->adresse      = $adresse;
        $this->codepostal   = $codepostal;
        $this->status       = $status;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
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

    public function getStatus()
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
}