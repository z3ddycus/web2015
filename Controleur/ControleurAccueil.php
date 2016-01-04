<?php

require_once 'Vue/Vue.php';

class ControleurAccueil {


// Affiche la liste de tous les billets du blog
    public function accueil() {
    	if (!file_exists("./Modele/bdd.php")){
    		header("Location: ./Install/install.php");
    	}
        $vue = new Vue("Accueil");
        $vue->generer(array());
    }
}

?>