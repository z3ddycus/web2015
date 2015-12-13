<?php

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurTest.php';
require_once 'Vue/Vue.php';
class Routeur {

    private $ctrlAccueil;

    public function __construct() {
       // $this->ctrlUser = new ControleurBillet();
        $this->ctrlAccueil = new ControleurAccueil();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) {
                if ($_GET['action'] == 'login') {
                    $pseudo = $this->getParametre($_POST, 'pseudo');
                    $password = $this->getParametre($_POST, 'password');
                    $this->ctrlUser->connect($pseudo, $password);
                }
				else if ($_GET['action'] == 'test') {
					$ctrlTest = new ControleurTest();
					$ctrlTest->test('Toto');
				}
                else
                    throw new Exception("Action non valide");
            }
            else {  // aucune action définie : affichage de l'accueil
                $this->ctrlAccueil->accueil();
                    throw new Exception("Action non valide");
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
