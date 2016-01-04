<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Contenu/style.css" />
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet" />
		
		<!-- Custom CSS page -->
	<link href="Contenu/principalSheet.css" rel="stylesheet" />
    <title>Installation du site</title>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="../bootstrap/js/jquery.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
  </head>
  <body>
  <div class="col-md-offset-1">
	<h1><u>Installation du site</u></h1>
	 <form action="traitementInstall.php" id="installForm"  name="login" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
        <div class="form-group">
        	<div class="col-md-8"><label for="login">Futur identifiant Quiz Constructor</label><input name="login" placeholder="Identifiant site" class="form-control" type="text"  id="login" required /></div>
        </div> 
        <div class="form-group">
        	<div class="col-md-8"><label for="password">Futur mot de passe Quiz Constructor</label><input name="password" placeholder="Mot de passe site" class="form-control" type="password" id="password" required /></div>
        </div> 
        <div class="form-group">
        	<div class="col-md-8"><label for="addrbdd">Adresse de la base de données (ex: localhost)</label><input name="adresseBdd" placeholder="Adresse" class="form-control" type="text" id="addrbdd" required /></div>
        </div> 
        <div class="form-group">
        	<div class="col-md-8"><label for="bdd">Nom de la base de données (ex: quiz)</label><input name="baseDeDonnee" placeholder="Base de donnée" class="form-control" type="text" id="bdd" required />
        	</div>
        </div> 
        <div class="form-group">
        	<div class="col-md-8"><label for="loginBdd">Identifiant de la base de données</label><input name="loginBdd" placeholder="Identifiant BDD" class="form-control" type="text" id="loginBdd" required /></div>
        </div> 
        <div class="form-group">
        	<div class="col-md-8"><label for="PasswordBdd">Mot de passe de la base de données</label><input name="passwordBdd" placeholder="Mot de passe BDD" class="form-control" type="password" id="PasswordBdd" /></div>
        </div> 

        <div class="form-group">
        	<div class="col-md-offset-0 col-md-8"><input  class="btn btn-success" type="submit" value="Installer"/></div>
        </div>
    
     </form>
	</div>
	<!-- Bootstrap core JavaScript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="../../dist/js/bootstrap.min.js"></script>
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>