<?php $this->titre = "Quiz Constructor - Edition de quiz"; ?>

<h2><u>Edition de quiz</u></h2>

<div class="container">
<div class="row">
<div class="col-xs-12">
    
    <div class="main">
            
        <div class="row">
	        <div class="col-xs-12 col-sm-6 col-sm-offset-0">      
	            <form action="index.php?traitement=editQuiz&quiz=<?php echo $quiz['id']; ?>" id="editionQuizForm"  name="editQuiz" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
	                <div class="form-group">
	                <div><label for="title"/>Titre</label><input name="title" placeholder="Insérer un titre" class="form-control" type="text" value="<?php echo $quiz['titre']; ?>" id="title" required ></input></div>
	                </div> 
	                
	                <div class="form-group">
	                <div><label for="description"/>Description du quiz</label><textarea name="description" placeholder="Insérer une description" id="description" rows="10" cols="50" class="form-control"><?php echo $quiz['description']; ?></textarea></div>
	                </div> 
	                
	                <div class="form-group">
	                <div><input class="btn btn-success" type="submit" value="Editer la description du quiz"/></div>
	                </div>
	            </form>
	        </div>
        </div>
		
        <div class="row">
			<p class="lead"><u>Liste des questions</u></p>
			<p class="text-muted">Cliquez sur une questions pour l'éditer</p>
	        <ul class="list-group">
				<?php foreach($question as $q) {?>
					<li class="list-group-item">
					<a href="index.php?editQuiz=<?php echo $quiz['id'].'&question='.$q['num']; ?>" class="btn btn-default">
						<?php echo $q['intitule']; ?> 
					</a>
					</li>
				<?php } ?>
			</ul>
        </div>
		
        <div class="row">
			<div>
				<a class="linkButton btn btn-primary" href="index.php?editQuiz=<?php echo $quiz['id'];?>&question=<?php echo $nbQuestion + 1; ?>"> Ajouter une question </a>
			</div>
        </div>
        <p class="text-muted"><?php if(isset ($message)) {echo $message;} ?></p>
    </div>
</div>
</div>
</div>