<?php $this->titre = "Quiz Constructor - Utilisateurs"; ?>

<ul class="list-group">
<?php
foreach($users as $user) {?>
	<li class="list-group-item">
	<!--<span class="label label-default label-pill pull-xs-right">Nb quizz</span>-->
	<a href="index.php?user=<?php echo $user['id']; ?>"><?php echo $user['pseudo']; ?></a>
	</li>
<?php }
?>
</ul>

<p><?php if(isset ($message)) {echo $message;} ?></p>
