<?php

$sqlCreateTableQuestion = "CREATE TABLE IF NOT EXISTS 'question' (
  'id_quizz' int(11) NOT NULL,
  'num' int(11) NOT NULL,
  'intitule' varchar(255) NOT NULL,
  'choix1' text NOT NULL,
  'choix2' text NOT NULL,
  'choix3' text,
  'choix4' text,
  'reponse' int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

$sqlCreateTableQuiz = "CREATE TABLE IF NOT EXISTS 'quiz' (
  'id' int(11) NOT NULL,
  'titre' varchar(255) NOT NULL,
  'id_auteur' varchar(255) NOT NULL,
  'description' text
) ENGINE=InnoDB AUTO_INCREMENT=2017 DEFAULT CHARSET=latin1;";

$sqlCreateTableUser = "CREATE TABLE IF NOT EXISTS 'user' (
  'id' int(11) NOT NULL,
  'pseudo' varchar(255) NOT NULL,
  'password' varchar(255) NOT NULL,
  'admin' tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;";

$sqlPrimaryKeyQuestion ="ALTER TABLE 'question' ADD PRIMARY KEY ('id_quizz','num');";
$sqlPrimaryKeyQuiz = "ALTER TABLE 'quiz' ADD PRIMARY KEY ('id');";
$sqlPrimaryKeyQuiz = "ALTER TABLE 'user' ADD PRIMARY KEY ('id');";

$sqlAIQuiz = "ALTER TABLE 'quiz' MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;";
$sqlAIUser = "ALTER TABLE 'user' MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;";

$fichier = fopen("./Modele/bdd.php", "w");
if ($fichier == NULL) {
  throw New Exception("Impossible de créer le fichier Modele/bdd.php");
}
fwrite($fichier, "<?php \$adresse_base_de_donnee = \"".$_POST['adresseBdd']
  ."\"; \$base_de_donnee = \"".$_POST['baseDeDonnee']
  ."\"; \$user_base_de_donnee = \"".$_POST['loginBdd']
  ."\";\$password_base_de_donnee = \"".$_POST['passwordBdd']."\";?>");
fclose($fichier);
header("Location: index.php");
?>