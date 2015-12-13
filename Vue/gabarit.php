<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Contenu/style.css" />
		<link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
		
		<!-- Custom CSS page -->
		<link href="Contenu/principalSheet.css" rel="stylesheet" />
		
		<script src="bootstrap/js/jquery.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
        <title><?= $titre ?></title>
    </head>
    <body>
		<!-- Barre de menu -->
		<div class="navbar navbar-inverse navbar-fixed-top barreMenu">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">Quiz Constructor</a>
				</div>
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="index.php?action=login">Login</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="page-header">
				<h1>Quiz Constructor</h1>
			</div>
			<p class="lead">Petit texte de présentation, que l'on retrouvera sur toutes les pages.</p>
			<!-- Contenu : généré sur la route -->
			<div id="content">
				<?= $contenu ?>
			</div>
		</div>

		
		<!-- Pied de page -->
		<footer class="footer">
			<div class="container">
				<p class="text-muted">Quiz Constructor a été réalisé par Thomas Capet et Yohann Henry</p>
			</div>
		</footer>
		
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="../../dist/js/bootstrap.min.js"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>