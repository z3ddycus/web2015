<?php

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurTest.php';
require_once 'Controleur/ControleurUser.php';
require_once 'Vue/Vue.php';
class Routeur {

    private $ctrlAccueil;

    public function __construct() {
       // $this->ctrlUser = new ControleurBillet();
        $this->ctrlAccueil = NULL;
        $this->ctrlUser = NULL;
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                // page login
                if ($_GET['action'] == 'login') {
                    if ($ctrlUser == NULL) {
                        $ctrlUser = new ControleurUser();
                        $this->ctrlUser->login();
                    }
                }
				else if ($_GET['action'] == 'test') {
					$ctrlTest = new ControleurTest();
					$ctrlTest->test('Toto');
				}
				else
                    throw new Exception("erreur 404");
            }
            else {  // aucune action définie : affichage de l'accueil
                if ($ctrlAccueil == NULL) {
                    $ctrlAccueil = New ControleurAccueil();
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
