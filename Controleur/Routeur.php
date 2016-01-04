<?php
session_start();
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurUser.php';
require_once 'Controleur/ControleurQuiz.php';
require_once 'Vue/Vue.php';

class Routeur {

    // Controleur de la page d'accueil
    private $ctrlAccueil;
    // Controleur des pages d'utilisateur
    private $ctrlUser;
    // Controleur des pages de Quiz
    private $ctrlQuiz;


    /**
     * Constructeur
     */
    public function __construct() {
        $this->ctrlAccueil = NULL;
        $this->ctrlUser = NULL;
        $this->ctrlQuiz = NULL;
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {
            if (isset($_GET['action'])) 
            {   
                // Tous les quiz
                if ($_GET['action'] == 'quiz') 
                {
                    $this->getControleurQuiz()->displayAllQuiz();
                }
                // Création de quiz
                else if ($_GET['action'] == 'createquiz') 
                { 
                    $this->getControleurQuiz()->createQuiz();
                }
                // Page de connexion
                else if ($_GET['action'] == 'login') 
                {
                    $this->getControleurUser()->login();
                } 
                // Page d'inscription
                else if ($_GET['action'] == 'inscription') 
                {
                    $this->getControleurUser()->inscription();
                }
                // Tous les utilisateurs
				else if ($_GET['action'] == 'users') 
                {
                    $this->getControleurUser()->users();
                } 
                else throw new Exception("erreur 404");
            } 
            else if (isset($_GET['traitement'])) 
            {
                // Traitement du formulaire de login
                if ($_GET['traitement'] == 'login') 
                {
                    $this->getControleurUser()->loginTraitement();
                }
                // Traitement du formulaire de création du quiz
                else if ($_GET['traitement'] == 'newquiz') 
                {
                    $this->getControleurQuiz()->traitementCreateQuiz();
                } 
                // Traitement du formulaire d'inscription
                else if ($_GET['traitement'] == 'inscription') 
                {
                    $this->getControleurUser()->inscriptionTraitement();
                } 
                else if ($_GET['traitement'] == 'resultat' && isset($_GET['quiz']))  
                {
                    $this->getControleurQuiz()->traitementPlayQuiz($_GET['quiz']);
                } 
                // Traitement du logoff
                else if ($_GET['traitement'] == 'logoff' && isset($_SESSION['user'])) 
                {
                    $this->getControleurUser()->logoff();
                } 
                else if ($_GET['traitement'] == 'editQuestion' && isset($_GET['quiz']) && isset($_GET['question']) && isset($_SESSION['user'])) 
                {
                    $this->getControleurQuiz()->traitementEditQuestion($_GET['quiz'], $_GET['question']);
                } 
                else if ($_GET['traitement'] == 'editQuiz' && isset($_GET['quiz']) && isset($_SESSION['user'])) 
                {
                    $this->getControleurQuiz()->traitementEditQuiz($_GET['quiz']);
                }
                else throw new Exception("erreur 404");
            }
            // Affichage d'un user
            else if (isset($_GET['user'])) 
            {   
                $this->getControleurUser()->displayUser($_GET['user']);
            }
            // faire un quiz
            else if (isset($_GET['playQuiz'])) {
                $this->getControleurQuiz()->playQuiz($_GET['playQuiz']);
            }
            // édite un quiz
            else if (isset($_GET['editQuiz']) && isset($_SESSION['user'])) 
            {
                if (isset($_GET['question'])) 
                {
                    $this->getControleurQuiz()->editQuestion($_GET['editQuiz'], $_GET['question']);
                } else 
                {
                    $this->getControleurQuiz()->editQuiz($_GET['editQuiz']);
                }
            }
            // Page d'accueil
            else 
            {
                $this->getControleurAccueil()->accueil();
            }
        }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
            echo $e;
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('message' => $msgErreur));
    }

    /**
     * Recherche un paramètre dans un tableau
     */
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }
    /**
     * Récupère et initialise au besoin le controleur des quiz
     */
    private function getControleurQuiz() {
        if ($this->ctrlQuiz == NULL) {
            $this->ctrlQuiz = New ControleurQuiz();
        }
        return $this->ctrlQuiz;
    }
    /**
     * Récupère et initialise au besoin le controleur des qutilisateurs
     */
    private function getControleurUser() {
        if ($this->ctrlUser == NULL) {
            $this->ctrlUser = New ControleurUser();
        }
        return $this->ctrlUser;
    }
    /**
     * Récupère et initialise au besoin le controleur de la page d'acceuil
     */
    private function getControleurAccueil() {
        if ($this->ctrlAccueil == NULL) {
            $this->ctrlAccueil = New ControleurAccueil();
        }
        return $this->ctrlAccueil;
    }

}
