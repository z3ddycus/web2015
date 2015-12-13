<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Contenu/style.css" />
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
		<link href="Contenu/principalSheet.css" rel="stylesheet">
		<script src="bootstrap/js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
        <title><?= $titre ?></title>
    </head>
    <body>
        <div id="generalBody">
				<div class="navbar navbar-inverse navbar-fixed-top">
			  <div class="container">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="#">Quiz Constructor</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
				  <ul class="nav navbar-nav">
					<li><a href="#">Accueil</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
				  </ul>
				</div><!--/.nav-collapse -->
			  </div>
			</div>

            <header>
                <a href="index.php"><h1 id="QuizzWeb">Mon Blog</h1></a>
                <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
            </header>
            <div id="content">
                <?= $contenu ?>
            </div> <!-- #contenu -->
            <footer id="footer">
                Blog réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
		
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="../../dist/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>