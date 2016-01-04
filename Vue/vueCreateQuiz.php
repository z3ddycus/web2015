<?php $this->titre = "Quiz Constructor - Nouveau Quiz"; ?>

<h2><u>Nouveau quiz</u></h2>

<div class="container">
<div class="row">
<div class="col-xs-12">
    
    <div class="main">
            
        <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-0">
                    
            <form action="index.php?traitement=newquiz" id="newQuizForm"  name="inscription" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
                <div class="form-group">
                <div><label for="title">Titre</label><input name="title" placeholder="Titre" class="form-control" type="text"  id="title" required /></div>
                </div> 
                
                <div class="form-group">
                <div><label for="description">Description</label><textarea name="description" placeholder="Description du quiz" id="description" rows="10" cols="50" class="form-control"></textarea></div>
                </div> 
                
                <div class="form-group">
                <div><input  class="btn btn-success" type="submit" value="Créer le quiz"/></div>
                </div>
            
                <p><?php if(isset ($message)) {echo $message;} ?></p>
            </form>
        </div>
        </div>
        
    </div>
</div>
</div>
</div>