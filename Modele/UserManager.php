<?php

require_once 'Modele/Modele.php';

/**
 * Gère les utilisateurs.
 */
class userManager extends Modele { 

    public function getUsers() {
        $sql = 'select * from user order by pseudo';
        $users = $this->executerRequete($sql);
        return $users->fetchAll();
    } 

    public function getUser($pseudo, $password == NULL) {
        $sql = 'select * from user where pseudo=?';
        $users = $this->executerRequete($sql, array($pseudo));
        if ($users->rowCount() > 0) {
            if ($users->rowCount() > 1) {
                throw new Exception("La bdd est corrompu plusieurs utilisateurs possèdent le même pseudo");   
            } else {
                $result = $users->fetch();
                if ($password == NULL || password_verify($password , $result['password'])) {
                    return $result;
                } else {
                    throw new Exception("Le mot de passe est incorrect");   
                }
            }
        }
        else
            return NULL;
    }

    public function getUserById($id) {
        $sql = 'select * from user where id=?';
        $users = $this->executerRequete($sql, array($id));
        if ($users->rowCount() > 0) { 
            return $users->fetch();
        }
        else
            return NULL;
    }
    public function putUser($pseudo, $password) {
        $sql = 'insert into user (pseudo, password) values (:p1,:p2)';
        $users = $this->executerRequete($sql, array('p1'=>$pseudo, 'p2'=>password_hash($password, PASSWORD_DEFAULT)));
    }
}