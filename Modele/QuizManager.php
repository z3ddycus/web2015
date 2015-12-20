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

    public function getQuestions($id) {
        $sql = 'select * from question where id_quizz=? order by num';
        $quiz = $this->executerRequete($sql, array($id));
        return $quiz->fetchAll();
    }

    public function getQuestion($id, $num) {
        $sql = 'select * from question where id_quizz=? and num =? order by num';
        $question = $this->executerRequete($sql, array($id, $num));
        if ($question->rowCount() > 0) { 
            return $quiz->fetch();
        }
        else
            return NULL;
    }

    // SETTER

    public function addQuestions($idQuiz, $questionArray) {
        $this->removeQuestions($idQuiz);
        $sql = 'insert into question (id_quiz,num,intitule,choix1,choix2,choix3,choix4,reponse) values 
        (:m_id_quiz,:m_num,:m_intitule,:m_choix1,:m_choix2,:m_choix3,:m_choix4,:m_reponse)';
        foreach ($questionArray as $question) {
            $this->executerRequete($sql, array(
                ':m_id_quiz' => $question['id_quiz'],
                ':m_num' => $question['num'],
                ':m_intitule' => $question['intitule'],
                ':m_choix1' => $question['choix1'],
                ':m_choix2' => $question['choix2'],
                ':m_choix3' => $question['choix3'],
                ':m_choix4' => $question['choix4'],
                ':m_reponse' => $question['reponse']));
        }
    }

    public function addQuizz($id, $titre, $auteur, $description) {
        $sql = 'insert into quiz (id, titre,id_auteur,description,nb,moyenne) values 
        (:m_id,:m_titre,:m_id_auteur,:m_description,:m_nb,:m_moyenne)';
        $this->executerRequete($sql, array(
                ':m_id' => $id,
                ':m_titre' => $titre,
                ':m_id_auteur' => $auteur,
                ':m_description' => $description,
                ':m_nb' => 0,
                ':m_moyenne' => 0));
    }

    public function removeQuestions($idQuiz) {
        $sql = 'delete from question where id = :m_id';
        $this->executerRequete(array('m_id'=>$idQuiz));
    }
}