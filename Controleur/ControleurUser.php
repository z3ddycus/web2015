<?php

require_once 'Vue/Vue.php';

class ControleurUser {

    public function __construct() {
    }

    public function login() {
    	$vue = new Vue("Login");
        $vue->generer(array());
    }

}

?>