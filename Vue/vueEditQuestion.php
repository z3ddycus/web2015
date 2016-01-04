<?php $this->titre = "Quiz Constructor - Edition de la question ".$numQuestion; ?>

<h2><u>Question <?php echo $numQuestion; ?> de <?php echo $quiz['titre']; ?></u></h2>

<div class="container">
<div class="row">
<div class="col-xs-12">
    
    <div class="main">
            
        <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-0">      
            <form action="index.php?traitement=editQuestion&quiz=<?php echo $quiz['id'];?>&question=<?php echo $numQuestion;?>" id="editQuestionForm"  name="editQuestionForm" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <div class="list-group">
                        <div class="list-item">
                            <label for="intitule">Intitulé</label><input name="intitule" placeholder="Description" class="form-control" type="text" value="<?php echo $question['intitule']; ?>" id="intitule" required />
                        </div>
                        <div class="list-item">
                            <label for="choix1">Réponse 1 :</label><input name="choix1" value="<?php echo $question['choix1']; ?>" class="form-control" type="text"  id="choix1" required />
                        </div>
                        <div class="list-item">
                            <label for="choix2">Réponse 2 :</label><input name="choix2" value="<?php echo $question['choix2']; ?>" class="form-control" type="text"  id="choix2" required />
                        </div>
                        <div class="list-item">
                             <label for="choix3">Réponse 3 :</label><input name="choix3" value="<?php echo $question['choix3']; ?>" class="form-control" type="text"  id="choix3"/>
                        </div>
                        <div class="list-item">
                            <label for="choix4">Réponse 4 :</label><input name="choix4" value="<?php echo $question['choix4']; ?>" class="form-control" type="text"  id="choix4"/>
                        </div>
						
                        <div class="list-item">
                                <h4><u>Bonne réponse :</u></h4>
                                <div class="radio">
                                    <label><input type="radio" name="reponse" value="1" <?php if($question['reponse'] == 1){echo "checked";} ?>/>Réponse 1</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="reponse" value="2" <?php if($question['reponse'] == 2){echo "checked";} ?>/>Réponse 2</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="reponse" value="3" <?php if($question['reponse'] == 3){echo "checked";} ?>/>Réponse 3</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="reponse" value="4" <?php if($question['reponse'] == 4){echo "checked";} ?>/>Réponse 4</label>
                                </div>
                        </div>
                        </div>

                    </div>
					<div class="form-group">
						<input class="btn btn-success" type="submit" value="Editer"/>
					</div>
                </div>
            
            </form>
        </div>
        </div>
        
    </div>
</div>
</div>
                <p id="messageInformationFormulaire" class="text-muted"><?php if(isset ($message)) {echo $message;} ?></p>
</div>
