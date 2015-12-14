<?php

require_once 'Modele/Modele.php';

/**
 * Gère les utilisateurs.
 */
class quizManager extends Modele { 

    public function getAllQuiz() {
        $sql = 'select * from quiz order by id';
        $quiz = $this->executerRequete($sql);
        return $quiz->fetchAll();
    } 

    public function getQuizFromUser($id) {
        $sql = 'select * from quiz where id_auteur=?';
        $quiz = $this->executerRequete($sql, array($id));
        return $result->fetchAll();
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
        $sql = 'select * from question where id_quiz=? order by num';
        $quiz = $this->executerRequete($sql, array($id));
        return $quiz->fetchAll();
    }

    public function getQuestion($id, $num) {
        $sql = 'select * from question where id_quiz=? and num =? order by num';
        $question = $this->executerRequete($sql, array($id, $num));
        if ($question->rowCount() > 0) { 
            return $quiz->fetch();
        }
        else
            return NULL;
    }
}