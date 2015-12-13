<?php $this->titre = "QuizzWeb - Login"; ?>

<form id="loginForm" method="post" action="index.php/?traitment=''">
	<label for="pseudo"><input type="text" name="pseudo" id="pseudo" required /></label>
	<label for="password"><input type="password" name="password" id="password" required /></label>
	<input type="submit" value="Se connecter"/>

	<p id="messageInformationFormulaire"><?= message ?></p>
</form>