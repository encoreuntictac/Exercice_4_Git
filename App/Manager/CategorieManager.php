<?php
namespace App\Demo\Manager;


class CategorieManager extends TableManager {

    public function addCateg($statut)
    {
        $req = $this->getPdo()->prepare('INSERT INTO categorie SET statut = :statut');
        $req->execute([
            'statut' => $statut
        ]);
    }
}