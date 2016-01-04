<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Erreur</title>
  </head>
  <body>
  	<h1>Problème lors de l'installation du site</h1>
	<p>
        L'installation du site a rencontré un problème.
        Vérifiez ce qui suit :
        <div class="list-group">
            <div class="list-item">
                Le dossier Modele possède les droits d'écriture.
            </div>
            <div class="list-item">
                Le fichier Install/traitementInstall.php possède les droits d'écriture.
            </div>
            <div class="list-item">
                La table renseigné est existante.
            </div>
            <div class="list-item">
                L'adresse de la table renseigné est existante.
            </div>
            <div class="list-item">
                Les identifiants de connexion à la base de données sont valides.
            </div>
            <div class="list-item">
                Les identifiants de connexion à la base de données permettent d'accéder à un utilisateur avec les droits suffisants pour créer/éditer/supprimer des tables sur la table renseignée.
            </div>
        </div>
    </p>
    <a href="install.php"> Réessayer l'installation</a>
  </body>
</html>