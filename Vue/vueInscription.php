<?php $this->titre = "Quiz Constructor - Inscription"; ?>

<?php $this->ajoutStyleSheet = "<link href=\"Contenu/loginSheet.css\" rel=\"stylesheet\" />"; ?>


<div class="container">
<div class="row">
<div class="col-xs-12">
    
    <div class="main">
            
        <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-0">
            <h2>Inscrivez vous</h2>
                    
            <form action="index.php?traitement=inscription" id="loginForm"  name="inscription" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
                <div class="form-group">
                <div class="col-md-8"><label for="login"><input name="login" placeholder="Identifiant" class="form-control" type="text"  id="login" required /></label></div>
                </div> 
                
                <div class="form-group">
                <div class="col-md-8"><label for="password"><input name="password" placeholder="Mot de passe" class="form-control" type="password" id="password" required /></label></div>
                </div> 
                
                <div class="form-group">
                <div class="col-md-8"><label for="password2"><input name="password2" placeholder="Mot de passe" class="form-control" type="password" id="password2" required /></label></div>
                </div> 
                
                <div class="form-group">
                <div class="col-md-offset-0 col-md-8"><input  class="btn btn-success" type="submit" value="S'inscrire"/></div>
                </div>
            
				<p id="messageInformationFormulaire"><?php if(isset ($message)) {echo $message;} ?></p>
            </form>
        </div>
        </div>
        
    </div>
</div>
</div>
</div>