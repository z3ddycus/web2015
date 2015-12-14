<?php

require_once 'Modele/Modele.php';

/**
 * Gère les utilisateurs.
 */
class userManager extends Modele { 

    public function getUsers() {
        $sql = 'select * from user order by pseudo';
        $billets = $this->executerRequete($sql);
        return $billets;
    }


    public function getUser($pseudo, $password) {
        $sql = 'select id,pseudo,password from user where pseudo=?';
        $users = $this->executerRequete($sql, array($pseudo));
        if ($users->rowCount() > 0) {
            if ($users->rowCount() > 1) {
                throw new Exception("La bdd est corrompu plusieurs utilisateurs possèdent le même pseudo");   
            } else {
                $result = $users->fetch();
                if (password_verify ($password , $result['password'])) {
                    return $result;
                } else {
                    throw new Exception("Le mot de passe est incorrect");   
                }
            }
        }
        else
            return NULL;
    }

    public function putUser($pseudo, $password) {
        $sql = 'insert into user (pseudo, password) values (:p1,:p2)';
        $users = $this->executerRequete($sql, array('p1'=>$pseudo, 'p2'=>password_hash($password, PASSWORD_DEFAULT)));
    }
}