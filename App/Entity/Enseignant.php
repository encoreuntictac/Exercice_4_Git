<?php
namespace App\Demo\Entity;

use DateTime;
use Faker\Factory;


class Enseignant extends Personne {
    const NBR_COURS_D = 5;

    private $anciennete;
    private $coursDonnes = [];
    private $entreeEnService;

    private static $enseignant;

    public function __construct(object $datas)
    {
        parent::__construct($datas);
        $this->status = 'Enseignant';
        $this->coursDonnes = parent::getChoiceLesson(self::NBR_COURS_D);
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

        $years = $dateNow->diff($dateOld);

        return $years->y;
    }

    public function getEntreeEnService()
    {
        $faker = Factory::create();
        $faker = $faker->dateTime();

        return $faker;
    }

    public function getDebut()
    {
        return $this->entreeEnService;
    }

    public function getListLesson()
    {
        return $this->coursDonnes;
    }
}