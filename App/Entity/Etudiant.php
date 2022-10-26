<?php 
namespace App\Demo\Entity;

class Etudiant extends Personne {
    
    protected $niveau;

    public function __construct($niveau)
    {
        parent::__construct();
        $this->niveau = $niveau;
    }
}