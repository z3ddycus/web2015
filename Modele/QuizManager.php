<?php

require_once 'Modele/Modele.php';

/**
 * Gère les utilisateurs.
 */
class quizManager extends Modele { 

    // GETTER

    public function getNextId() {
        $sql = 'select max(id) from quiz';
        $result = $this->executerRequete($sql);
        return $result->fetch()[0] + 1;
    }

    public function getAllQuiz() {
        $sql = 'select * from quiz order by id';
        $quiz = $this->executerRequete($sql);
        return $quiz->fetchAll();
    } 

    public function getQuizFromUser($id) {
        $sql = 'select * from quiz where id_auteur=?';
        $quiz = $this->executerRequete($sql, array($id));
        return $quiz->fetchAll();
    }

    public function getQuizById($id) {
        $sql = 'select * from quiz where id=?';
        $quiz = $this->executerRequete($sql, array($id));
        if ($quiz->rowCount() > 0) { 
            return $quiz->fetch();
        }
        else
            return NULL;
    }
    public function getNbQuestion($id) {
        $sql = 'select max(num) from question where id_quizz =?';
        $result = $this->executerRequete($sql, array($id));
        return $result->fetch()[0];
    }

    public function getQuestions($id) {
        $sql = 'select * from question where id_quizz=? order by num';
        $quiz = $this->executerRequete($sql, array($id));
        return $quiz->fetchAll();
    }

    public function getQuestion($id, $num) {
        $sql = 'select * from question where id_quizz=? and num =? order by num';
        $question = $this->executerRequete($sql, array($id, $num));
        if ($question->rowCount() > 0) { 
            return $question->fetch();
        }
        else
            return NULL;
    }

    // SETTER

    public function addQuestion($idQuiz, $question) {
        if ($this->getQuestion($idQuiz, $question['num']) == NULL) {
            $sql = 'insert into question (id_quizz,num,intitule,choix1,choix2,choix3,choix4,reponse) values 
            (:m_id_quiz,:m_num,:m_intitule,:m_choix1,:m_choix2,:m_choix3,:m_choix4,:m_reponse)';
        } else {
            $sql = 'update question 
                    set 
                        intitule=:m_intitule,
                        choix1=:m_choix1,
                        choix2=:m_choix2,
                        choix3=:m_choix3,
                        choix4=:m_choix4,
                        reponse=:m_reponse
                    where id_quizz =:m_id_quiz and num = :m_num';
        }

        $this->executerRequete($sql, array(
            'm_id_quiz' => $idQuiz,
            'm_num' => $question['num'],
            'm_intitule' => $question['intitule'],
            'm_choix1' => $question['choix1'],
            'm_choix2' => $question['choix2'],
            'm_choix3' => $question['choix3'],
            'm_choix4' => $question['choix4'],
            'm_reponse' => $question['reponse']));
    }
    public function editQuiz($id, $titre, $description) {
        $sql = 'update quiz 
                set 
                    titre = :m_titre,
                    description = :m_description
                where id = :m_id';
        $this->executerRequete($sql, array(
                'm_id' => $id,
                'm_titre' => $titre,
                'm_description' => $description));
    }
    public function addQuizz($id, $titre, $auteur, $description) {   
        $sql = 'insert into quiz (id, titre,id_auteur,description) values 
        (:m_id,:m_titre,:m_id_auteur,:m_description)';
        $this->executerRequete($sql, array(
                ':m_id' => $id,
                ':m_titre' => $titre,
                ':m_id_auteur' => $auteur,
                ':m_description' => $description));
    }

    public function removeQuestion($idQuiz, $numQuestion) {
        $sql = 'delete from question where (id_quizz = :m_id and num = :m_num)';
        $this->executerRequete(array('m_id'=>$idQuiz, 'm_num'=>$numQuestion));
    }

    public function removeQuestions($idQuiz) {
        $sql = 'delete from question where id_quizz = ?';
        $this->executerRequete(array($idQuiz));
    }
}