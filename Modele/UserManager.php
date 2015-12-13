<?php

require_once 'Modele/Modele.php';

/**
 * Gère les utilisateurs.
 */
class userManager extends Modele { 

    /** Renvoie la liste des billets du blog
     * 
     * @return PDOStatement La liste des billets
     */
    public function getUsers() {
        $sql = 'select * from user order by pseudo';
        $billets = $this->executerRequete($sql);
        return $billets;
    }

    /** Renvoie les informations sur un billet
     * 
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     */
    public function getUser($pseudo, $password) {
        $sql = 'select * from user where pseudo=?';
        $users = $this->executerRequete($sql, array($pseudo));
        if ($users->rowCount() > 0) {
            if ($users->rowCount() > 1) {
                throw new Exception("La bdd est corrompu plusieurs utilisateurs possèdent le même pseudo");   
            } else {
                $result = $users->fetch();
                if (true) {//password_verify ($password , $result->password)) {
                    return $result;
                } else {
                    throw new Exception("Le mot de passe est incorrect");   
                }
            }
        }
        else
            return NULL;
    }

}