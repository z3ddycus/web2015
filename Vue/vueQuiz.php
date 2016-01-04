<?php $this->titre = "Quiz Constructor - Quiz"; ?>


<?php if (isset($_SESSION['user'])) { ?>
	<div class="well well-sm">
		<a class="linkButton btn btn-success" href="index.php?action=createquiz">Créer un quiz</a>
	</div>
<?php } ?>

<h2><u>Liste des quiz</u></h2>
<p class="text-muted">Voici la liste des quiz créés par les utilisateurs. Pour jouer, cliquez sur le nom du quiz.</p>
<ul class="list-group">
	<?php foreach($quiz as $q) {?>
		<li class="list-group-item">
			<a href="index.php?playQuiz=<?php echo $q['id'];?>" class="btn btn-default">
				<?php echo $q['titre']; ?> 
			</a>
			<?php if (isset($_SESSION['user']) && ($_SESSION['user']['admin'] || ($q['id_auteur'] == $_SESSION['user']['id']))) {?>
					<a href="index.php?editQuiz=<?php echo $q['id'];?>" class="pull-right btn btn-primary">
						<?php echo "Editer"; ?> 
					</a>
			<?php } ?>
			</li>
	<?php } ?>
</ul>

<p class="text-muted"><?php if(isset ($message)) {echo $message;} ?></p>
