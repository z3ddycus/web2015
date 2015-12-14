<?php

require_once 'Vue/Vue.php';
require_once 'Modele/UserManager.php';

class ControleurUser {

    public function __construct() {
    }


    private function isValidPseudo($pseudo) {
        //regex et taille
        return true;
    }
    private function isValidPassword($password) {
        //regex et taille
        return true;
    }

    public function login() {
    	$vue = new Vue("Login");
        $vue->generer(array());
    }

    public function loginTraitement() {
        if (isset($_POST['login']) && isset($_POST['password'])) {
        	$userManager = New UserManager();
            $user = $userManager->getUser(htmlspecialchars($_POST['login']), htmlspecialchars($_POST['password']));
        	if ($user != NULL) {
        		$_SESSION['user'] = $user;
                $vue = new Vue("Accueil");
    	        $vue->generer(array('message'=>"Vous êtes connecté"));
        	} else {
                $vue = new Vue("Login");
                $vue->generer(array('message'=>"Les identifiants sont incorrects"));
        	}
        } else {
            $vue = new Vue("Login");
            $vue->generer(array('message'=>"Les champs ne sont pas remplies"));
        }
    }

    public function inscription() {
        $vue = new Vue("Inscription");
        $vue->generer(array());
    }

    public function inscriptionTraitement() {
        if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['password2'])) {
            $userManager = New UserManager();
            if ($this->isValidPassword($_POST['password']) && $this->isValidPseudo($_POST['login'])) {
                $userManager->putUser($_POST['login'], $_POST['password']);
                $vue = new Vue("Accueil");
                $vue->generer(array('message'=>"Votre inscription s'est bien déroulée"));
            } else {
                $vue = new Vue("Inscription");
                $vue->generer(array('message'=>"Les champs sont incorrectement remplies"));
            }
        } else {
            $vue = new Vue("Inscription");
            $vue->generer(array('message'=>"Les champs ne sont pas remplies"));
        }
    }

    public function logoff() {
        unset($_SESSION['user']);
        $vue = new Vue("Accueil");
        $vue->generer(array('message'=>"Vous avez été déconnecté"));
    }

}

?>