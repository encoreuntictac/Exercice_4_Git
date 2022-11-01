<?php
namespace App\Demo\Entity;

use Faker\Factory;

class Personne 
{
    private $id;
    private $nom;
    private $prenom;
    private $adresse;
    private $codepostal;
    protected $status;

    private static $personne;
    
    /**
     * __construct
     *
     * @param  mixed $datas La possibilité d'utilise Faker ou instancier soit même les donnés
     * 
     * @return Nouvelle instance Personne 
     */
    public function __construct(object $datas)
    {
        if (is_a($datas, 'App\Demo\Entity\Personne')) {
            $this->nom          = $datas->getNom();
            $this->prenom       = $datas->getPrenom();
            $this->adresse      = $datas->getAdresse();
            $this->codepostal   = $datas->getCodePostal();
        } else {
            $this->nom          = $datas->lastName();
            $this->prenom       = $datas->firstName();
            $this->adresse      = $datas->address();
            $this->codepostal   = $datas->postcode();
        }
    }
    
    /**
     * newPersonne
     *
     * @return Object Personne 
     */
    public static function newPersonne() {
        self::$personne = new self(Factory::create());
        return self::$personne;
    }
        
    /**
     * Crée un array aléatoirement des cours donnés ou suivis  
     *
     * @param  mixed $nbr Decide la taille du tableau 
     * 
     * @return array 
     * 
     * @author Parasmo Marco 
     */
    public function getChoiceLesson($nbr) {
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

            $action = count($tabCour) === $nbr ? false : true;
        }
        return $tabCour;
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