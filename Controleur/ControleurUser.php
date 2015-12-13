<?php

require_once 'Vue/Vue.php';

class ControleurUser {

    public function __construct() {
    }

    public function login() {
    	$vue = new Vue("Login");
        $vue->generer(array());
    }

    public function loginTraitement() {
    	$user = New User();
    	if ($user->getUser(htmlspecialchars($_POST['pseudo']), htmlspecialchars($_POST['password'])) == NULL) {
    		$_SESSION['user'] = $user;
            $vue = new Vue("Accueil");
	        $vue->generer(array('message'=>"Vous êtes connecté. <3"));
    	} else {
            $vue = new Vue("Login");
            $vue->generer(array('message'=>"Les identifiants sont incorrects. </3"));
    	}
    }

}

?>