<?php
class Install {
  private $bdd;

  /**
   * Exécute une requête SQL
       */
  public function executerRequete($sql, $params = null) {
      if ($params == null) {
          $resultat = $this->getBdd()->query($sql); // exécution directe
      }
      else {
          $resultat = $this->getBdd()->prepare($sql);  // requête préparée
          $resultat->execute($params);
      }
      return $resultat;
  }

  /**
   * Renvoie une connexion à la bdd
   */
  public function getBdd() {
      if ($this->bdd == null) {
          // Création de la connexion
          include "../Modele/bdd.php";
          $this->bdd = new PDO(
                  'mysql:host='.$adresse_base_de_donnee.';dbname='.$base_de_donnee.';charset=utf8',
                  $user_base_de_donnee, $password_base_de_donnee,
                  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      }
      return $this->bdd;
  }
  public function fullInstall() {
    // liste des requêtes sql pour la création des tables
    $sqlCreateTableQuestion = "CREATE TABLE IF NOT EXISTS question (
      id_quizz int(11) NOT NULL,
      num int(11) NOT NULL,
      intitule varchar(255) NOT NULL,
      choix1 text NOT NULL,
      choix2 text NOT NULL,
      choix3 text,
      choix4 text,
      reponse int(11) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

    $sqlCreateTableQuiz = "CREATE TABLE IF NOT EXISTS quiz (
      id int(11) NOT NULL,
      titre varchar(255) NOT NULL,
      id_auteur varchar(255) NOT NULL,
      description text
    ) ENGINE=InnoDB AUTO_INCREMENT=2017 DEFAULT CHARSET=latin1;";

    $sqlCreateTableUser = "CREATE TABLE IF NOT EXISTS user (
      id int(11) NOT NULL,
      pseudo varchar(255) NOT NULL,
      password varchar(255) NOT NULL,
      admin tinyint(1) NOT NULL
    ) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;";

    $sqlPrimaryKeyQuestion ="ALTER TABLE question ADD PRIMARY KEY (id_quizz,num);";
    $sqlPrimaryKeyQuiz = "ALTER TABLE quiz ADD PRIMARY KEY (id);";
    $sqlPrimaryKeyUser = "ALTER TABLE user ADD PRIMARY KEY (id);";

    $sqlAIQuiz = "ALTER TABLE quiz MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;";
    $sqlAIUser = "ALTER TABLE user MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;";



    try {
      // préparation des accès à la base de donnée.
      $fichier = fopen("../Modele/bdd.php", "w");
      if ($fichier == NULL) {
        return false;
      }
      fwrite($fichier, "<?php \$adresse_base_de_donnee = \"".$_POST['adresseBdd']
        ."\"; \$base_de_donnee = \"".$_POST['baseDeDonnee']
        ."\"; \$user_base_de_donnee = \"".$_POST['loginBdd']
        ."\";\$password_base_de_donnee = \"".$_POST['passwordBdd']."\";?>");
      fclose($fichier);

        $bdd = $this->getBdd();
        if ($bdd == Null) {
          return false;
        }
        $bdd->beginTransaction();
        // création de la base de donnée
      try {
        $this->executerRequete($sqlCreateTableQuestion);
        $this->executerRequete($sqlCreateTableQuiz);
        $this->executerRequete($sqlCreateTableUser);
        $this->executerRequete($sqlPrimaryKeyQuestion);
        $this->executerRequete($sqlPrimaryKeyQuiz);
        $this->executerRequete($sqlPrimaryKeyUser);
        $this->executerRequete($sqlAIQuiz);
        $this->executerRequete($sqlAIUser);

        // ajout de l'administrateur
        $sqlAdmin = "insert into user(id, pseudo, password, admin) values (0, ?, ?, 1)";
        $this->executerRequete($sqlAdmin, array($_POST['login'], password_hash($_POST['password'], PASSWORD_DEFAULT)));
        $bdd->commit();
        return true;
      } catch (Exception $e) {
        $bdd->rollback();
        return false;
      }
    } catch (Exception $e) {
      return false;
    }
  }
}
  $install = new Install();
  if ($install->fullInstall()) {
    // accès accueil
    header("Location: ../index.php");
  } else {
    header("Location: installProblem.php");
  }
?>