<!DOCTYPE html>
<html lang="fr">

<?php require 'includes/head.php'; ?>

<body>

<?php require 'includes/navbar.php'; ?>

    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
					<div class="col-sm-6">
						<?php
				      $reponse = $connexion->query('SELECT * FROM enseignant e LEFT OUTER JOIN matiere m ON e.matiere_id = m.matiere_id');

				      while ($donnees = $reponse->fetch())
				      {
				        if ($_SESSION['login'] == $donnees['enseignant_pseudo']) {
				      ?>
	<h3>PANNEL DE L'ENSEIGNANT</h3>
		 <h4>
		 <strong>Bienvenue <?php echo $donnees['enseignant_prenom'] . " " . $donnees['enseignant_nom']; ?>
		 </strong></h4>
					</div>
					<div class="col-sm-6">
							  <img src="images/logo2.png" style="width: 30%; float: right; ">
					</div>
				</div>
			</div>
		</section>
		<?php
      }
    }
      $reponse->closeCursor(); // Termine le traitement de la requête
      ?>

		<section id="panel" class="silver">
			<div class="container">
				 <div class="row">
			<div class="col-lg-12 center">
				<?php if(isset($_POST['promo'])) {

				            $_SESSION['promo'] = $_POST['promo'];
				            ?>
				        <div id="titre">    <h1>ABSENCE / RETARD</h1>   </div>

				        <form action="traitement_absence.php" method="post" id="form-inscription">
				            <fieldset>
				                <div class="col-lg-12">
				                    <div class="input-group" style="width: 100%">

				                        <div class="col-lg-3">
				                            <h3><span class="label label-primary">ELEVES</span></h3>
				                        </div>
				                        <div class="col-lg-3">
				                            <h3><span class="label label-primary">- 15 MIN</span></h3>
				                        </div>
				                        <div class="col-lg-3">
				                            <h3><span class="label label-primary">+ 15 MIN</span></h3>
				                        </div>
				                        <div class="col-lg-3">
				                            <h3><span class="label label-primary">ABSENT</span></h3>
				                        </div>

				                        <?php
				                          $e = $connexion->prepare('SELECT * FROM etudiant WHERE promo_id = '.$_SESSION['promo'].' ');
				                            $e->execute();

				                            while($rep = $e->fetch()){

				                            echo '
				                            <div class="col-lg-3">
				                                <br><span class="students-list">'.strtoupper($rep["etudiant_nom"]). ' '.$rep["etudiant_prenom"]. '</span>
				                            </div>
				                            <div class="col-lg-3">
				                                <input style="visibility: hidden;" type="radio" name="ret_abs'.$rep['etudiant_id'].'" value="0" checked>
				                                <input style="margin-left: 45%;" type="radio" name="ret_abs'.$rep['etudiant_id'].'" value="1">
				                            </div>
				                            <div class="col-lg-3">
				                                <input style="margin-left: 45%;" type="radio" name="ret_abs'.$rep['etudiant_id'].'" value="2">
				                            </div>
				                            <div class="col-lg-3">
				                                <input style="margin-left: 45%;" type="radio" name="ret_abs'.$rep['etudiant_id'].'" value="3">
				                                <input type="hidden" name="id_'.$rep['etudiant_id'].'" value="'.$rep["etudiant_id"].'">
				                            </div>
				                            <br><br><br><br><br><br><br> ';
				                            }

				                        ?>
				                        <input type="submit" name="envoi" class="btn btn-default" id="envoi-absence" value="Envoyer">

				                    </div>

				                </div>
									 <a href="enseignement.php" class="btn btn-connexion">Retour</a>

				          </fieldset>
				        </form>

				        <?php
				    }
				        else { ?>
				            <div class="container">
				            <div class="jumbotron enseignant">
				                    <div class="input-group2">
				                        <form method="post" action="absence.php">
				                            </select>
				                            <label class="label label-enseignant" for="promo">Choisissez la promo</label><br />
				                            <select class="form-control" name="promo" required>
				                               <option value="300">promo 2013</option>
				                               <option value="301">promo 2014</option>
				                               <option value="302">promo 2015</option>
				                            </select>
				                            <input type="submit" class="btn btn-default" name="submit"></input>
				                        </form>
				                    </div>
				            </div>
								<a href="enseignement.php" class="btn btn-connexion">Retour</a>

				        </div>
				        <?php
				        }
				        ?>
			</div>
		</div>
	</div>
	</section>
