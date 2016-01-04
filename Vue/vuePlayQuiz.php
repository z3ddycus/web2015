<script>
	var score = 0;
	var nbMax = <?php echo count($question); ?>;
	var done = 0;
	function success() {
		++score;
		++done;
	}

	function failure() {
		++done;
	}

</script>

<?php
	function displayChoice($choice, $numReponse, $numQuestion) {
		if (!empty($choice)) {
			echo '<input type="radio" value="'.$numReponse.'" name="choice'.$numQuestion.'"/>'.$choice.'</br>';
		}
	}

	function displayQuestion($question, $k) {
		echo "<div class='question'><p class='intitule'>Question ".$k." : ".$question['intitule']."</p>";
		displayChoice($question['choix1'], 1, $k);
		displayChoice($question['choix2'], 2, $k);
		displayChoice($question['choix3'], 3, $k);
		displayChoice($question['choix4'], 4, $k);
		echo "</div>";
	}
?>
<?php $this->titre = "Quiz Constructor - Faire un quiz"; ?>

<h2><?php echo $quiz["titre"]; ?> </h2>
<p><?php echo $quiz["description"]; ?></p>

<?php if (count($questions) > 0) { ?>

	<form action="index.php?traitement=resultat&quiz=<?php echo $quiz['id'];?>" id="playQuizForm"  name="playQuizForm" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
		<ul class="list-group">

			<?php 
				$k=1;
				foreach($questions as $q) {
			?>
				<li class="list-group-item">
					<?php displayQuestion($q, $k); ?>
				</li>
			<?php
				++$k; 
				} 
			?>

			<input class="btn btn-success" type="submit" value="Soumettre le quiz"/>
		</ul>
	</form>

<?php } else { ?>
	<p> Ce quiz ne comporte encore aucune question.<p>
<?php } ?>
<p><?php if(isset ($message)) {echo $message;} ?></p>