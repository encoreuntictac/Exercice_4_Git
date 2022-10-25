<?php
namespace App\Demo\Manager;

use Faker\Factory;
use App\Demo\Entity\Personne;
use App\Demo\Manager\TableManager;
use PDO;

class PersonneManager {
    
    private $connexion; 

    public function __construct($connexion)
    {
        $this->connexion = $connexion; 
    }

    public function getConnexion()
    {
        return $this->connexion;
    }

    /**
     * $statement est un nombre affiche la personne de la BD avec l'ID équivalent 
     * $statement = true affiche la dernière insertion 
     * $statement = false affiche tout 
     * 
     * @method read
     *
     * @param  mixed $statement
     * @return void
     */
    public function read($statement = false)
    {

        if (is_int($statement)) {

            $req = $this->getConnexion()->prepare('SELECT * FROM personne WHERE id= :id');
            $req->execute([
                'id'           => $statement
            ]);
        } else {
            $req = $this->getConnexion()->query('SELECT * FROM personne');
        }


        if ($statement) {

            $datas = $req->fetch(PDO::FETCH_OBJ);
        } else {

            $datas = $req->fetchAll(PDO::FETCH_OBJ);
        }

        return $datas;
    }
}