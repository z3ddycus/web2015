<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Installation du site</title>
  </head>
  <body>
  	<h1>Installation du site</h1>
	 <form action="traitementInstall.php" id="installForm"  name="login" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
        <div class="form-group">
        	<div class="col-md-8"><label for="Login admin"><input name="login" placeholder="Identifiant" class="form-control" type="text"  id="login" required /></label></div>
        </div> 
        <div class="form-group">
        	<div class="col-md-8"><label for="Password"><input name="password" placeholder="Mot de passe" class="form-control" type="password" id="password" required /></label></div>
        </div> 
        <div class="form-group">
        	<div class="col-md-8"><input name="adresseBdd" placeholder="Adresse Base de donnée" class="form-control" type="text" id="addrbdd" required />
        	(ex: localhost)</div>
        </div> 
        <div class="form-group">
        	<div class="col-md-8"><input name="baseDeDonnee" placeholder="Base de donnée" class="form-control" type="text" id="bdd" required />
        	(ex: quiz)</div>
        </div> 
        <div class="form-group">
        	<div class="col-md-8"><label for="loginBdd"><input name="loginBdd" placeholder="Login de bdd" class="form-control" type="text" id="loginBdd" required /></label></div>
        </div> 
        <div class="form-group">
        	<div class="col-md-8"><label for="PasswordBdd"><input name="passwordBdd" placeholder="Mot de passe de bdd" class="form-control" type="password" id="PasswordBdd"/></label></div>
        </div> 

        <div class="form-group">
        	<div class="col-md-offset-0 col-md-8"><input  class="btn btn-success" type="submit" value="Installer"/></div>
        </div>
    
     </form>
  </body>
</html>