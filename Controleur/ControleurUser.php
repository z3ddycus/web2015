<?php

require_once 'Vue/Vue.php';
require_once 'Modele/UserManager.php';

class ControleurUser {

    public function __construct() {
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
    	        $vue->generer(array('message'=>"Vous êtes connecté. <3"));
        	} else {
                $vue = new Vue("Login");
                $vue->generer(array('message'=>"Les identifiants sont incorrects. </3"));
        	}
        } else {
            echo $_POST['login'];
            echo $_POST['password'];
            return ;
            $vue = new Vue("Login");
            $vue->generer(array('message'=>"Les champs ne sont pas remplies. </3"));
        }
    }

}

?>