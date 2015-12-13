<?php

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurUser.php';
require_once 'Vue/Vue.php';
class Routeur {

    private $ctrlAccueil;
    private $ctrlUser;

    public function __construct() {
        $this->ctrlAccueil = NULL;
        $this->ctrlUser = NULL;
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                // page login
                if ($_GET['action'] == 'login') {
                    if ($this->ctrlUser == NULL) {
                        $this->ctrlUser = New ControleurUser();
                    }
                    $this->ctrlUser->login();
                }else
                    throw new Exception("erreur 404");
            }
            else {  // aucune action définie : affichage de l'accueil
                if ($this->ctrlAccueil == NULL) {
                    $this->ctrlAccueil = New ControleurAccueil();
                }
                $this->ctrlAccueil->accueil();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }

}
