<?php $this->titre = "Quiz Constructor - Inscription"; ?>

<?php $this->ajoutStyleSheet = "<link href=\"Contenu/loginSheet.css\" rel=\"stylesheet\" />"; ?>

<h2><u>Inscription</u></h2>

<div class="container">
<div class="row">
<div class="col-xs-12">
    <div class="main">
            
        <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-0">
                    
            <form action="index.php?traitement=inscription" id="loginForm"  name="inscription" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
                <div class="form-group">
                <div><label for="login">Identifiant</label><input name="login" placeholder="Identifiant" class="form-control" type="text"  id="login" required /></div>
                </div> 
                
                <div class="form-group">
                <div><label for="password">Mot de passe</label><input name="password" placeholder="Mot de passe" class="form-control" type="password" id="password" required /></div>
                </div> 
                
                <div class="form-group">
                <div><label for="password2">Confirmer le mot de passe</label><input name="password2" placeholder="Mot de passe" class="form-control" type="password" id="password2" required /></div>
                </div> 
                
                <div class="form-group">
                <div><input  class="btn btn-success" type="submit" value="S'inscrire"/></div>
                </div>
            </form>
        </div>
        </div>
        
    </div>
</div>
</div>
	<p class="text-muted"><?php if(isset ($message)) {echo $message;} ?></p>
</div>