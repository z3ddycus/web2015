<?php

require_once 'Vue/Vue.php';
require_once 'Modele/QuizManager.php';

class ControleurQuiz {

    // ATTRIBUT

	private $quizManager;

    // CONSTRUCTEUR

    public function __construct() {
        $this->quizManager = NULL;
    }

    // CREATION DE VUE

    public function playQuiz($id) { // secure
        if (!isset($id) || !is_integer($id)) {
            throw New Exception("Valeurs aberrantes, j'espère qu'on ne vous y reprendra pas.");
        }
        $manager = $this->getQuizManager();
        $quiz = $manager->getQuizById($id);
        if ($quiz == NULL) {
            throw New Exception("Quiz inconnu");
        }
        $question = $manager->getQuestions($id);
        $vue = new Vue("Quiz");
        $vue->generer(array('quiz'=>$quiz, 'questions'=>$question));
    }

    public function createQuiz() {
        if (!isset($_SESSION['user'])) {
            throw New Exception("Vous n'avez pas les droits pour créer un quiz.");
        }
        $vue = new Vue("CreateQuiz");
        $vue->generer(array());
    }

    public function traitementCreateQuiz() { 
        if (!isset($_SESSION['user'])) {
            throw New Exception("Vous n'avez pas les droits pour créer un quiz.");
        }
        $id = $this->getQuizManager()->getNextId();
        // Info du quiz général
        if ($this->isValidQuizTitle($_POST['title'])) {
            // Ajout de l'entête du quiz
            $this->getQuizManager()->addQuizz($id, $_POST['title'], $_SESSION['user']['id'], htmlspecialchars($_POST['description']));
        }
        header("Location: index.php?editquiz=".$id);
    }





    public function traitementEditQuiz($idQuiz) {
        // analyse des champs des questions
        $prefixe = 'q1_';
        $questionNb = 1;
        $listQuestion = array();
        $problem = false;

        while(isset($_POST[$prefixe.'intitule'])) {
            if (isset($_POST[$prefixe.'champ1'])
                && isset($_POST[$prefixe.'champ2']) 
                && isset($_POST[$prefixe.'champ3']) 
                && isset($_POST[$prefixe.'champ4']) 
                && isset($_POST[$prefixe.'reponse'])) {

                if ($this->isValidQuestion($_POST[$prefixe.'champ1'],$_POST[$prefixe.'champ2'],
                        $_POST[$prefixe.'champ3'],$_POST[$prefixe.'champ4'],
                        $_POST[$prefixe.'reponse'],$_POST[$prefixe.'intitule'])) {

                        $listQuestion[$questionNb] = array('id_quizz' => $idQuiz,
                                    'num' => $questionNb, 
                                    'intitule' => htmlspecialchars($_POST[$prefixe.'intitule']),
                                    'choix1' => $_POST[$prefixe.'champ1'],
                                    'choix2' => $_POST[$prefixe.'champ2'],
                                    'choix3' => $_POST[$prefixe.'champ3'],
                                    'choix4' => $_POST[$prefixe.'champ4'],
                                    'reponse' => $_POST[$prefixe.'reponse']);
                } else {
                    $problem = true;
                }
            } else {
                throw New Exception("La requête réagit étrangement. Vous n'auriez pas bidouillé maladroitement une requête?");
            }
            ++$questionNb;
            $prefixe = 'q'.$questionNb.'_'; 
        }
        if ($problem) {
            $vue = new Vue('EditQuiz');
            $vue-> generer(array('quiz'=>$idQuiz, 'questions'=>$listQuestion, 'message'=>'Certains champs ne sont pas convenablement remplies'));
        } else {
            $this->getQuizManager()->addQuestions($idQuiz, $listQuestion);
            $vue = new Vue("Quiz");
            $vue->generer(array());
        }
    }

    public function displayAllQuiz() {
        $vue = New Vue("Quiz");
        $vue->generer(array('quiz' => $this->getQuizManager()->getAllQuiz()));
    }





    public function editQuiz($id) { 
        if (!isset($_SESSION['user'])) {
            throw New Exception("Vous n'avez pas les droits pour créer un quiz.");
        }
        $quiz = $this->getQuizManager()->getQuizById($id);
        if ($quiz == NULL) {
            throw New Exception("Ce quiz n'existe pas.");
        }
        if ($_SESSION['user']['admin'] || $quiz['id_auteur'] != $_SESSION['user'][id]) {
            throw New Exception("Vous n'êtes pas le propriétaire de ce quiz.");
        }

        $vue = new Vue('EditQuiz');
        $vue->generer(array('quiz' => $quiz, 'question' => $this->getQuizManager()->getQuestions($id)));
    }

    // PRIVATE FUNCTION

    private function isValidQuestion($intitule, $choix1, $choix2, $choix3, $choix4, $reponse) {
        return true;
    }

    private function isValidQuizTitle($title){
        return true;
    }

    private function getQuizManager() {
        if ($this->quizManager == NULL) {
            $this->quizManager = New QuizManager();
        }
        return $this->quizManager;
    }


}

?>