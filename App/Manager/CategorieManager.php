<?php
namespace App\Demo\Manager;


class CategorieManager extends TableManager {

    public static function addCateg($statut)
    {
        $req = parent::getConnexion('poo_php')->prepare('INSERT INTO categorie SET statut = :statut');
        $req->execute([
            'statut' => $statut
        ]);
    }
}