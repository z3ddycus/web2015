<!-- Un fichier permettant d'afficher le nom de l'utilisateur connecté
si il y en a un, et "Login"/"S'inscrire" sinon. Se palce dans une navbar. -->

<?php
if (isset($_SESSION['user'])) { ?>
	<li><a href="#">$_SESSION['user']['pseudo']</a></li>
	<li><a href="index.php?traitement=logoff">Déconnexion</a></li>
<?php } else { ?>
	<li><a href="index.php?action=inscription">Inscription</a></li>
	<li><a href="index.php?action=login">Connexion</a></li>
<?php } ?>
