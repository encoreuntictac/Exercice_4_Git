<?php 
namespace App\Demo\Entity;

use DateTime;
use Faker\Factory;

class Etudiant extends Personne {
    
    private $niveau;
    private $coursSuivis = [];
    private $dateInscription; 
    
    private static $etudiant;

    public function __construct(object $datas)
    {
        parent::__construct($datas);
        $this->status = 'Etudiant';
        $this->niveau = self::getNiveau();
        $this->coursSuivis = self::getCour();
    } 

    
    public static function newEtudiant() {
        self::$etudiant = new self(parent::newPersonne());
        return self::$etudiant;
    }

    public function getNiveau()
    {
        $faker = Factory::create();
        return $faker->randomElement([
            "'première'",
            "'deuxième'",
            "'troisième'",
            "'quatrième'",
            "'cinquième'",
            "'terminal'"
        ]);
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

            $action = count($tabCour) === 3 ? false : true;
        }
        return $tabCour;
    }
}
