<?php $this->titre = "Quiz Constructor - Edition de quiz"; ?>

<?php $this->ajoutStyleSheet = "<link href=\"Contenu/loginSheet.css\" rel=\"stylesheet\" />"; ?>


<div class="container">
<div class="row">
<div class="col-xs-12">
    
    <div class="main">
            
        <div class="row">
	        <div class="col-xs-12 col-sm-6 col-sm-offset-0">
	            <h2>Edition de quiz</h2>
	                    
	            <form action="index.php?traitement=editQuiz&quiz=<?php echo $quiz['id']; ?>" id="editionQuizForm"  name="editQuiz" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
	                <div class="form-group">
	                <div class="col-md-8"><label for="title"/><input name="title" placeholder="Insérer un titre" class="form-control" type="text" value="<?php echo $quiz['titre']; ?>" id="title" required ></input></div>
	                </div> 
	                
	                <div class="form-group">
	                <div class="col-md-8"><label for="description"/><textarea name="description" placeholder="Insérer une description" id="description" rows="10" cols="50"><?php echo $quiz['description']; ?></textarea> </div>
	                </div> 
	                
	                <div class="form-group">
	                <div class="col-md-offset-0 col-md-8"><input  class="btn btn-success" type="submit" value="Editer la description du quiz"/></div>
	                </div>
	            
	            </form>
	        </div>
        </div>
        <div class="row">
	        <ul class="list-group">
				<?php foreach($question as $q) {?>
					<li class="list-group-item">
					<a href="index.php?editQuiz=<?php echo $quiz['id'].'&question='.$q['num']; ?>">
						<?php echo $q['intitule']; ?> 
					</a>
					</li>
				<?php } ?>
			</ul>
        </div>
        <div class="row">
			<div class="well">
				<a class="linkButton" href="index.php?editQuiz=<?php echo $quiz['id'];?>&question=<?php echo $nbQuestion + 1; ?>"> Ajouter une question </a>
			</div>
        </div>
        <p><?php if(isset ($message)) {echo $message;} ?></p>
    </div>
</div>
</div>
</div>