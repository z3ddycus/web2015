<?php $this->titre = "Quiz Constructor - Quiz"; ?>


<?php if (isset($_SESSION['user'])) { ?>
	<div class="well">
	<a class="linkButton" href="index.php?action=createquiz"><h5>Nouveau quiz</h5></a>
	</div>
<?php } ?>

<ul class="list-group">
		<li class="list-group-item">
			<h3>Liste des quiz</h3>
		</li>
	<?php foreach($quiz as $q) {?>
		<li class="list-group-item">
			<a href="index.php?quiz=<?php echo $q['id'];?>">
				<?php echo $q['titre']; ?> 
			</a>
			<?php if (isset($_SESSION['user']) && ($_SESSION['user']['admin'] || ($q['id_auteur'] == $_SESSION['user']['id']))) {?>
					<a href="index.php?editQuiz=<?php echo $q['id'];?>">
						<?php echo "(Editer)"; ?> 
					</a>
			<?php } ?>
			</li>
	<?php } ?>
</ul>

<p><?php if(isset ($message)) {echo $message;} ?></p>
