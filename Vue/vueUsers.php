<?php $this->titre = "Quiz Constructor - Utilisateurs"; ?>

<ul class="list-group">
<?php
foreach($users as $user) {?>
	<li class="list-group-item"><a href="index.php?user=<?php echo $user['id']; ?>"><?php echo $user['pseudo']; ?></a></li>
<?php }
?>
</ul>
