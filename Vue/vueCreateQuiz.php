<?php $this->titre = "Quiz Constructor - Nouveau Quiz"; ?>

<?php $this->ajoutStyleSheet = "<link href=\"Contenu/loginSheet.css\" rel=\"stylesheet\" />"; ?>


<div class="container">
<div class="row">
<div class="col-xs-12">
    
    <div class="main">
            
        <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-0">
            <h2>Nouveau quiz</h2>
                    
            <form action="index.php?traitement=newquiz" id="newQuizForm"  name="inscription" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
                <div class="form-group">
                <div class="col-md-8"><label for="title"><input name="title" placeholder="titre" class="form-control" type="text"  id="title" required /></label></div>
                </div> 
                
                <div class="form-group">
                <div class="col-md-8"><label for="description"><textarea name="description" placeholder="Insérer ici une brève description du quiz" id="description" rows="10" cols="50"></textarea>   </label></div>
                </div> 
                
                <div class="form-group">
                <div class="col-md-offset-0 col-md-8"><input  class="btn btn-success" type="submit" value="Créer le quiz"/></div>
                </div>
            
                <p><?php if(isset ($message)) {echo $message;} ?></p>
            </form>
        </div>
        </div>
        
    </div>
</div>
</div>
</div>