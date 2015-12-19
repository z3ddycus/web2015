<?php $this->titre = "Quiz Constructor - ".$user['pseudo']; ?>

<h2>Fiche de <?php echo $user['pseudo']; ?></h2>
<p class="lead">Id : <?php echo $user['id']; ?></p>

<ul class="list-group">
	<?php foreach($quiz as $q) {?>
		<li class="list-group-item">
		<!--<span class="label label-default label-pill pull-xs-right">Nb quizz</span>-->
		<a href="index.php?quiz=<?php echo $q['id'];?>">
			<?php echo $q['titre']; ?> 
		</a>
		</li>
	<?php } ?>
</ul>