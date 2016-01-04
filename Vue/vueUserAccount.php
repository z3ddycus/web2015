<?php $this->titre = "Quiz Constructor - ".$user['pseudo']; ?>

<h2><u>Fiche de <?php echo $user['pseudo']; ?></u></h2>

<h3>Liste des quiz créés</h3>

<p class="text-muted">Cliquez sur un quiz pour y jouer.</p>

<ul class="list-group">
	<?php foreach($quiz as $q) {?>
		<li class="list-group-item">
			<a href="index.php?playQuiz=<?php echo $q['id'];?>" class="btn btn-default">
				<?php echo $q['titre']; ?> 
			</a>
			<a href="index.php?editQuiz=<?php echo $q['id'];?>" class="pull-right btn btn-primary">
				<?php echo "Editer"; ?> 
			</a>
			</li>
	<?php } ?>
</ul>