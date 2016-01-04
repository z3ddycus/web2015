<?php

require_once 'Vue/Vue.php';
require_once 'Modele/UserManager.php';
require_once 'Modele/QuizManager.php';

class ControleurUser {
	
    // ATTRIBUT
    private $quizManager;
	private $userManager;

    // CONSTRUCTEUR

    public function __construct() {
        $this->userManager = NULL;
    }

    // CREATEUR DE VUE

    public function login() {
    	$vue = new Vue("Login");
        $vue->generer(array());
    }

    public function inscription() {
        $vue = new Vue("Inscription");
        $vue->generer(array());
    }

    public function logoff() {
        unset($_SESSION['user']);
        $vue = new Vue("Accueil");
        $vue->generer(array('message'=>"Vous avez été déconnecté"));
    }
	
	public function users() {
        $vue = new Vue("Users");
        $vue->generer(array('users' => $this->getUserManager()->getUsers()));
    }

    public function displayUser($id) {
        $user = $this->getUserManager()->getUserById($id);
        if ($user == NULL) {
            throw new Exception("Utilisateur inconnu");
        }
        $allQuiz = $this->getQuizManager()->getQuizFromUser($user['id']);
        $vue = new Vue("UserAccount");
        $vue->generer(array('user' => $user, 'quiz' => $allQuiz));
    }

    public function inscriptionTraitement() {
        if (isset($_POST['login']) && isset($_POST['password']) && isset($_POST['password2'])) {
            if ($this->isValidPassword($_POST['password']) && $this->isValidPseudo($_POST['login']) &&  $this->getUserManager()->getUser($_POST['login']) == Null ) {
                $this->getUserManager()->putUser($_POST['login'], $_POST['password']);
                $vue = new Vue("Accueil");
                $vue->generer(array('message'=>"Votre inscription s'est bien déroulée"));
            } else {
                $vue = new Vue("Inscription");
                $vue->generer(array('message'=>"Les champs sont incorrectement remplis"));
            }
        } else {
            $vue = new Vue("Inscription");
            $vue->generer(array('message'=>"Les champs ne sont pas remplis"));
        }
    }

    public function loginTraitement() {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            if ($this->isValidPseudo($_POST['login']) && $this->isValidPassword($_POST['password'])) {
                $user = $this->getUserManager()->getUser($_POST['login'], $_POST['password']);
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
                $vue->generer(array('message'=>"Les identifiants sont incorrects"));
            }
        } else {
            $vue = new Vue("Login");
            $vue->generer(array('message'=>"Les champs ne sont pas remplis"));
        }
    }


    // PRIVATE FUNCTION

    private function getUserManager() {
        if ($this->userManager == NULL) {
            $this->userManager = New UserManager();
        }
        return $this->userManager;
    }

    private function getQuizManager() {
        if ($this->quizManager == NULL) {
            $this->quizManager = New QuizManager();
        }
        return $this->quizManager;
    }
    private function isValidPseudo($pseudo) {
        return isset($pseudo) && is_string($pseudo) && preg_match("#^[a-zA-Z0-9]{1,20}$#", $pseudo);
    }
    private function isValidPassword($password) {
        return isset($password) && is_string($password) && preg_match("#^[a-zA-Z0-9]{1,20}$#", $password);
    }
}

?>