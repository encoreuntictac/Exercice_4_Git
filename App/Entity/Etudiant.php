<?php 
namespace App\Demo\Entity;

use Faker\Factory;

class Etudiant extends Personne {
    const NBR_COURS = 3;

    private $niveau;
    private $coursSuivis = [];
    private $dateInscription; 
    
    private static $etudiant;

    public function __construct(object $datas)
    {
        parent::__construct($datas);
        $this->status = 'Etudiant';
        $this->niveau = self::getLvl();
        $this->coursSuivis = parent::getChoiceLesson(self::NBR_COURS);
    } 

    
    public static function newEtudiant() {
        self::$etudiant = new self(parent::newPersonne());
        return self::$etudiant;
    }

    public function getLvl()
    {
        $faker = Factory::create();
        return $faker->randomElement([
            "première",
            "deuxième",
            "troisième",
            "quatrième",
            "cinquième",
            "terminal"
        ]);
    }

    public function getListLesson()
    {
        return $this->coursSuivis;
    }
}
