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
        if (!isset($id)) {
            throw New Exception("Valeurs aberrantes, j'espère qu'on ne vous y reprendra pas.");
        }
        $manager = $this->getQuizManager();
        $quiz = $manager->getQuizById($id);
        if ($quiz == NULL) {
            throw New Exception("Quiz inconnu");
        }
        $question = $manager->getQuestions($id);
        $vue = new Vue("PlayQuiz");
        $vue->generer(array('quiz'=>$quiz, 'questions'=>$question));
    }

    public function traitementPlayQuiz($id) {
        $quiz = $this->getQuizManager()->getQuizById($id);
        if ($quiz == NULL) {
            throw new Exception("Quiz inconnu");
        }
        $questions = $this->getQuizManager()->getQuestions($id);
        $nb = 0;

        for ($k = 1; $k <= count($questions); ++$k) { 
            if (isset($_POST["choice".$k])) {
                if ($questions[$k-1]['reponse'] == $_POST['choice'.$k]) {
                    ++$nb;
                }
            }
        }
        $vue = new Vue("Resultat");
        $vue->generer(array("nbQuestion"=>count($questions), "nbBonneReponse"=>$nb)); 
    }

    public function createQuiz() {
        if (!isset($_SESSION['user'])) {
            throw New Exception("Vous n'avez pas les droits pour créer un quiz.");
        }
        $vue = new Vue("CreateQuiz");
        $vue->generer(array());
    }

    public function addQuestion($idQuiz, $numQuestion) {
        $quiz = $this->getQuizManager()->getQuizById($idQuiz);
        if ($quiz == NULL) {
            throw New Exception("Ce quiz n'existe pas. Tenteriez vous de tricher?");
        }
        if ($_SESSION['user']['admin'] || $quiz['id_auteur'] != $_SESSION['user']['id']) {
            throw New Exception("Ce quiz ne vous appartient pas. Vil faquin");
        }
        $question = $this->getQuizManager()->getQuestion($idQuiz, $numQuestion);
        $vue = new Vue("EditQuestion");
        $vue->generer(array('quiz'=>$quiz, 'question'=>$question));
    }

    public function traitementCreateQuiz() { 
        if (!isset($_SESSION['user'])) {
            throw New Exception("Vous n'avez pas les droits pour créer un quiz.");
        }
        $id = $this->getQuizManager()->getNextId(); 
        // Info du quiz général
        if ($this->isValidQuiz($_POST['title'], $_POST['description'])) {
            // Ajout de l'entête du quiz
            $this->getQuizManager()->addQuizz($id, $_POST['title'], $_SESSION['user']['id'], htmlspecialchars($_POST['description']));
        }
        header("Location: index.php?editQuiz=".$id);
    }
    public function traitementEditQuiz($idQuiz) {
        if ($this->isValidQuiz($_POST['title'], $_POST['description'])) {
            $quiz = $this->getQuizManager()->getQuizById($idQuiz);
            if ($quiz == NULL) {
                throw new Exception("Ce quiz n'existe pas.");
            } else if ($_SESSION['user']['admin'] || $_SESSION['user']['id'] != $quiz['id_auteur']) {
                throw new Exception("Ce quiz n'est pas de vous.");
            } else {
                $id = $idQuiz;
                $this->getQuizManager()->editQuiz($id, $_POST['title'], $_SESSION['user']['id'], htmlspecialchars($_POST['description']));
            }
            header("Location: index.php?editQuiz=".$id);
        } else {
            $_SESSION['message'] = "Les données du quiz sont invalides.";
            header("Location: index.php");
        }
    }
    public function traitementEditQuestion($idQuiz, $idQuestion) {
        if ($this->isValidQuestion($_POST['intitule'], $_POST['choix1'],$_POST['choix2'],
                 $_POST['choix3'],$_POST['choix4'], $_POST['reponse'])) {

            $question = array('id_quizz' => $idQuiz,
                        'num' => $idQuestion, 
                        'intitule' => htmlspecialchars($_POST['intitule']),
                        'choix1' => $_POST['choix1'],
                        'choix2' => $_POST['choix2'],
                        'choix3' => $_POST['choix3'],
                        'choix4' => $_POST['choix4'],
                        'reponse' => $_POST['reponse']);

            $this->getQuizManager()->addQuestion($idQuiz, $question);
            header("Location: index.php?editQuiz=".$idQuiz);
        } else {
            throw new Exception("Les champs sont incorrectement remplis");
        }
    }


    public function displayAllQuiz() {
        $vue = New Vue("Quiz");
        $vue->generer(array('quiz' => $this->getQuizManager()->getAllQuiz()));
    }

    public function editQuestion($idQuiz, $numQuestion) {
        $quiz = $this->getQuizManager()->getQuizById($idQuiz);
        if ($quiz == NULL) {
            throw New Exception("Le quiz n'existe pas.");
        }
        if ($_SESSION['user']['admin'] || $quiz['id_auteur'] != $_SESSION['user']['id']) {
            throw New Exception("Vous n'êtes pas le propriétaire de ce quiz.");
        }
        $question = $this->getQuizManager()->getQuestion($idQuiz, $numQuestion);
        $vue = new Vue("EditQuestion");
        $vue->generer(array('quiz'=>$quiz, 'question'=> $question, 'numQuestion' => $numQuestion));
    }

    public function editQuiz($id) { 
        if (!isset($_SESSION['user'])) {
            throw New Exception("Vous n'avez pas les droits pour créer un quiz.");
        }
        $quiz = $this->getQuizManager()->getQuizById($id);
        if ($quiz == NULL) {
            throw New Exception("Ce quiz n'existe pas.");
        }
        if ($_SESSION['user']['admin'] || $quiz['id_auteur'] != $_SESSION['user']['id']) {
            throw New Exception("Vous n'êtes pas le propriétaire de ce quiz.");
        }
        $nbQuestion = $this->getQuizManager()->getNbQuestion($id);
        $vue = new Vue('EditQuiz');
        $vue->generer(array('quiz' => $quiz, 'question' => $this->getQuizManager()->getQuestions($id), 'nbQuestion' => $this->getQuizManager()->getNbQuestion($id)));
    }

    // PRIVATE FUNCTION

    private function isValidQuestion($intitule, $choix1, $choix2, $choix3, $choix4, $reponse) {
        $result = isset($reponse);
        if ($result) {
            $nb = 2;
            if (isset($choix3) && !empty($choix3)) {
                ++$nb;
            }
            if (isset($choix4) && !empty($choix4)) {
                if ($nb <= 2)  {
                    $choix3 = $choix4;
                    if ($reponse = 4) {
                        $reponse = 3;
                    }
                } else {
                    ++$nb;
                }
            }
            $result = $reponse > 0 && $reponse <= $nb;
        }
        return $result;
    }

    private function isValidQuiz($title, $description){
        return isset($title) && isset($description);
    }

    private function getQuizManager() {
        if ($this->quizManager == NULL) {
            $this->quizManager = New QuizManager();
        }
        return $this->quizManager;
    }
    

}

?>