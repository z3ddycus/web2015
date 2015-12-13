<!-- Un fichier permettant d'afficher le nom de l'utilisateur connecté
si il y en a un, et "Login"/"S'inscrire" sinon. Se palce dans une navbar. -->

<?php
session_start();
if (isset($_SESSION['user'])) { ?>
	<li><a href="#">Mon compte</a></li>
<?php } else { ?>
	<li><a href="#">Inscription</a></li>
	<li><a href="index.php?action=login">Connexion</a></li>
<?php } ?>
