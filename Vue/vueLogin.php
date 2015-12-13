<?php $this->titre = "QuizzWeb - Login"; ?>

<?php $this->ajoutStyleSheet = "<link href=\"Contenu/loginSheet.css\" rel=\"stylesheet\" />"; ?>

<div class="container">
<div class="row">
<div class="col-xs-12">
    
    <div class="main">
            
        <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-0">
            <h2>Connectez vous</h2>
                    
            <form action="index.php?traitement=login" id="loginForm"  name="login" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
                <div class="form-group">
                <div class="col-md-8"><label for="pseudo"><input name="username" placeholder="Identifiant" class="form-control" type="text"  id="pseudo" required /></label></div>
                </div> 
                
                <div class="form-group">
                <div class="col-md-8"><label for="password"><input name="password" placeholder="Mot de passe" class="form-control" type="password" id="password" required /></label></div>
                </div> 
                
                <div class="form-group">
                <div class="col-md-offset-0 col-md-8"><input  class="btn btn-success" type="submit" value="Se connecter"/></div>
                </div>
            
				<p id="messageInformationFormulaire"><?= $message ?></p>
            </form>
        </div>
        </div>
        
    </div>
</div>
</div>
</div>
