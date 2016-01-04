<?php $this->titre = "Quiz Constructor - Utilisateurs"; ?>

<h2><u>Liste des utilisateurs</u></h2>

<p class="text-muted">Cliquez sur un utilisateur pour accéder à sa fiche et à ses quiz.</p>

<ul class="list-group" class="input-medium">
<?php
foreach($users as $user) {?>
	<li class="list-group-item">
	<!--<span class="label label-default label-pill pull-xs-right">Nb quizz</span>-->
	<a href="index.php?user=<?php echo $user['id']; ?>" class="btn btn-default"><?php echo $user['pseudo']; ?></a>
	</li>
<?php }
?>
</ul>

<p class="text-muted"><?php if(isset ($message)) {echo $message;} ?></p>
