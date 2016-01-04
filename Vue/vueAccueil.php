<?php $this->titre = "Quiz Constructor - Accueil"; ?>

<p class="text-muted"><?php if(isset ($message)) {echo $message;} ?></p>

<div class="page-header">
	<h1><u>Quiz Constructor</u></h1>
</div>

<p class="lead">Quiz Constructor est un site dédié à la création et au jeu de quiz.</p>

<p class="lead">Pour créer des quiz, pensez à vous inscrire et à vous connecter.</p>

<form action="index.php?action=quiz"  name="buttonPlay" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
	<div class="form-group">
	<div class="col-md-offset-0 col-md-8"><input class="btn btn-success" type="submit" value="Commencer à jouer"/></div>
	</div>
</form>
