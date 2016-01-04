<?php

/**
 * Classe abstraite Modèle.
 */
abstract class Modele {
    private $bdd;

    /**
     * Exécute une requête SQL
         */
    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql); // exécution directe
        }
        else {
            $resultat = $this->getBdd()->prepare($sql);  // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }

    /**
     * Renvoie une connexion à la bdd
     */
    protected function getBdd() {
        if ($this->bdd == null) {
            // Création de la connexion
            include "Modele/bdd.php";
            $this->bdd = new PDO(
                    'mysql:host='.$adresse_base_de_donnee.';dbname='.$base_de_donnee.';charset=utf8',
                    $user_base_de_donnee, $password_base_de_donnee,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->bdd;
    }

}