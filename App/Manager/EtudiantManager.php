<?php
namespace App\Demo\Manager;

use Faker\Factory;
use App\Demo\Entity\Personne;
use PDO;

class EtudiantManager extends PersonneManager {

    public function addEtudiant($personne)
    {
        parent::addPersonne($personne);
        $new_id =  $this->getPdo()->query('SELECT id FROM personne ORDER BY id DESC LIMIT 1');
        return $new_id->fetch(PDO::FETCH_OBJ);
    }
}