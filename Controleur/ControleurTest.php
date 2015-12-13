<?php

require_once 'Vue/Vue.php';

class ControleurTest {


// Affiche la liste de tous les billets du blog
    public function test($nomTesteur) {
        $vue = new Vue("Test");
        $vue->generer(array('testerName' => $nomTesteur));
    }

}