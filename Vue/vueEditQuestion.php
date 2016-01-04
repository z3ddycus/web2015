<?php $this->titre = "Quiz Constructor - Edition de la question <?php echo $numQuestion; ?>"; ?>

<?php $this->ajoutStyleSheet = "<link href=\"Contenu/loginSheet.css\" rel=\"stylesheet\" />"; ?>


<div class="container">
<div class="row">
<div class="col-xs-12">
    
    <div class="main">
            
        <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-0">
            <h2>Question <?php echo $numQuestion; ?> du quiz <?php echo $quiz['id']; ?></h2>
                    
            <form action="index.php?traitement=editQuestion&quiz=<?php echo $quiz['id'];?>&question=<?php echo $numQuestion;?>" id="editQuestionForm"  name="editQuestionForm" role="form" class="form-horizontal" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <div class="list-group">
                        <div class="list-item">
                            <label for="intitule"><input name="intitule" placeholder="Description" class="form-control" type="text" value="<?php echo $question['intitule']; ?>" id="intitule" required /></label>
                        </div>
                        <div class="list-item">
                            <label for="choix1">choix 1 :</label><input name="choix1" value="<?php echo $question['choix1']; ?>" class="form-control" type="text"  id="choix1" required />
                        </div>
                        <div class="list-item">
                            <label for="choix2">choix 2 :</label><input name="choix2" value="<?php echo $question['choix2']; ?>" class="form-control" type="text"  id="choix2" required />
                        </div>
                        <div class="list-item">
                             <label for="choix3">choix 3 :</label><input name="choix3" value="<?php echo $question['choix3']; ?>" class="form-control" type="text"  id="choix3"/>
                        </div>
                        <div class="list-item">
                            <label for="choix4">choix 4 :</label><input name="choix4" value="<?php echo $question['choix4']; ?>" class="form-control" type="text"  id="choix4"/>
                        </div>
                        <div class="list-item">
                            <div class="list-group">
                                <div class="list-item">
                                    <label>Bonne réponse :</label>
                                </div>
                                <div class="list-item">
                                    <input type="radio" name="reponse" value="1"> 1</input>   
                                </div>
                                <div class="list-item">
                                    <input type="radio" name="reponse" value="2"> 2</input>
                                </div>
                                <div class="list-item">
                                    <input type="radio" name="reponse" value="3"> 3</input>
                                </div>
                                <div class="list-item">
                                    <input type="radio" name="reponse" value="4"> 4</input>
                                </div>
                        </div>
                        </div>

                    </div>
                    <input  class="btn btn-success" type="submit" value="Editer"/>
                </div>
            
                <p id="messageInformationFormulaire"><?php if(isset ($message)) {echo $message;} ?></p>
            </form>
        </div>
        </div>
        
    </div>
</div>
</div>
</div>
