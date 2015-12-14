<?php

require_once 'Vue/Vue.php';
require_once 'Modele/UserManager.php';

class ControleurUser {
	
	private $userManager;

    public function __construct() {
        $this->userManager = NULL;
    }


    private function isValidPseudo($pseudo) {
        return preg_match("#^[a-zA-Z0-9]{1,20}$#", $pseudo);
    }
    private function isValidPassword($password) {
        return preg_match("#^[a-zA-Z0-9]{1,20}$#", $password);
    }

    public function login() {
    	$vue = new Vue("Login");
        $vue->generer(array());
    }

    public function loginTraitement() {
        if (isset($_POST['login']) && isset($_POST['password'])) {
        	if ($this->userManager == NULL) {
                $this->userManager = New UserManager();
            }
            $user = $this->userManager->getUser(htmlspecialchars($_POST['login']), htmlspecialchars($_POST['password']));
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
            $vue->generer(array('message'=>"Les champs ne sont pas remplis"));
        }
    }

    public function inscription() {
        $vue = new Vue("Inscription");
        $vue->generer(array());
    }

    public function inscriptionTraitement() {
        if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['password2'])) {
            
            if ($this->userManager == NULL) {
                $this->userManager = New UserManager();
            }

            if ($this->isValidPassword($_POST['password']) && $this->isValidPseudo($_POST['login'])) {
                $this->userManager->putUser($_POST['login'], $_POST['password']);
                $vue = new Vue("Accueil");
                $vue->generer(array('message'=>"Votre inscription s'est bien déroulée"));
            } else {
                $vue = new Vue("Inscription");
                $vue->generer(array('message'=>"Les champs sont incorrectement remplies"));
            }
        } else {
            $vue = new Vue("Inscription");
            $vue->generer(array('message'=>"Les champs ne sont pas remplis"));
        }
    }

    public function logoff() {
        unset($_SESSION['user']);
        $vue = new Vue("Accueil");
        $vue->generer(array('message'=>"Vous avez été déconnecté"));
    }

	
	public function users() {
		if ($this->userManager == NULL) {
            $this->userManager = New UserManager();
        }
        $vue = new Vue("Users");
        $vue->generer(array('users' => $this->userManager->getUsers()));
    }

    public function displayUser($id) {
        if ($this->userManager == NULL) {
            $this->userManager = New UserManager();
        }
    }
}

?>