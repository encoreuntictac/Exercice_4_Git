<?php
namespace App\Demo\Entity;

use DateTime;
use Faker\Factory;

class Enseignant extends Personne {
    private $anciennete;
    private $coursDonnes = [];
    private $entreeEnService;

    private static $enseignant;

    public function __construct(object $datas)
    {
        parent::__construct($datas);
        $this->status = 'Enseignant';
        $this->coursDonnes = self::getCour();
        $this->entreeEnService = self::getEntreeEnService();
        $this->anciennete = self::getAnciennete();
    } 

    public static function newEnseignant() {
        self::$enseignant = new self(parent::newPersonne());
        return self::$enseignant;
    }

    public function getAnciennete()
    {
        $dateNow = new DateTime();

        $dateOld = $this->entreeEnService;
        // var_dump($dateNow);
        // var_dump($dateOld);
        $years = $dateNow->diff($dateOld);
        // var_dump($years->y);
        return $years->y;
    }

    public function getEntreeEnService()
    {
        $faker = Factory::create();
        $faker = $faker->dateTime();
        // var_dump($faker->format('Y/m/d H:i'));
        // var_dump($faker);
        return $faker;
    }

    public function getDebut()
    {
        return $this->entreeEnService;
    }

    public function getCour()
    {
        $faker = Factory::create();
        $tabCour = [];
        $action = true;
        
        while($action) {
            $cour = $faker->randomElement([
                'Math',
                'Français',
                'Anglais',
                'Science',
                'Histoire',
                'Géographie',
                'Economie'
            ]);

            !in_array($cour, $tabCour) ? array_push($tabCour, $cour): '';

            $action = count($tabCour) === 5 ? false : true;
        }
        return $tabCour;
    }
}