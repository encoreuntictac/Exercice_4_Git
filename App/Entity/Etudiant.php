<?php 
namespace App\Demo\Entity;

use DateTime;
use Faker\Factory;

class Etudiant extends Personne {
    
    protected $niveau;
    protected $cours = [];
    // protected $date;

    public function __construct(object $datas)
    {
        parent::__construct($datas);
        $this->niveau = self::getNiveau();
        $this->cours = self::getCour();
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
