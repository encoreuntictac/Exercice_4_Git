<?php
namespace App\Demo\Manager;

use App\Demo\Manager\TableManager;

class CoursManager{

    public static function addCour($cour)
    {
        $req = TableManager::getConnexion('poo_php')->prepare('INSERT INTO cours SET titre_nom = :titre_nom');
        $req->execute([
            'titre_nom' => $cour
        ]);
    }
}