<?php $this->titre = "Quiz Constructor - Quiz"; ?>

<?php if (isset($_SESSION['user'])) { ?>
	<a href="index.php?action=createquiz">Nouveau quiz</a>
<?php } ?>

<ul class="list-group">
	<?php foreach($quiz as $q) {?>
		<li class="list-group-item">
		<!--<span class="label label-default label-pill pull-xs-right">Nb quizz</span>-->
		<a href="index.php?quiz=<?php echo $q['id']; ?>">
			<?php echo $q['titre']; ?> 
		</a>
		</li>
	<?php } ?>
</ul>

<p><?php if(isset ($message)) {echo $message;} ?></p>
