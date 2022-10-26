<?php
namespace App\Demo\Entity;

class Categorie {

    private $titre; 

    public function __construct($titre) 
    {
        $this->titre = $titre;
    }

    
    public function getTitre()
    {
        return $this->titre;
    }
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }
}