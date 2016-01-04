<?php $this->titre = "Quiz Constructor - ".$user['pseudo']; ?>

<h2>Fiche de <?php echo $user['pseudo']; ?></h2>

<ul class="list-group">
		<li class="list-group-item">
			<h3>Liste des quiz de cet utilisateur</h3>
		</li>
	<?php foreach($quiz as $q) {?>
		<li class="list-group-item">
			<a href="index.php?playQuiz=<?php echo $q['id'];?>">
				<?php echo $q['titre']; ?> 
			</a>
			<a href="index.php?editQuiz=<?php echo $q['id'];?>">
				<?php echo "(Editer)"; ?> 
			</a>
			</li>
	<?php } ?>
</ul>