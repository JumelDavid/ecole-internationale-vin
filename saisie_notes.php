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
				<?php if(isset($_POST['date_exam']) && isset($_POST['type_exam']) && isset($_POST['promo'])) {?>
        <div class="jumbotron enseignant">
            <?php
            $_SESSION['date_exam'] = $_POST['date_exam'];
            $_SESSION['type_exam'] = $_POST['type_exam'];
            $_SESSION['promo'] = $_POST['promo'];
            print_r($_SESSION);
            $promo = $_SESSION['promo'];
            // on récupère le contenu de la table eleve
            $reponse = $connexion->query('SELECT * FROM etudiant WHERE promo_id = '.$promo.' ORDER BY etudiant_nom');
            $matiere = $connexion->query('SELECT * FROM matiere');
            $evaluation = $connexion->query('SELECT * FROM evaluation');
            ?>
            <form method="post" action="notes.php">
              <div class="panel panel-default">
              <div class="panel-heading">SAISIE DES NOTES</div>
                <table class="table">
                    <tr><td>Elèves</td><td>Notes</td></tr>
                    <?php
                    // on affiche chaque entrée
                    while ($donnees = $reponse->fetch())
                    {?>
                        <tr>
                            <td><?=$donnees['etudiant_nom'].' '.$donnees['etudiant_prenom']?></td>
                            <td><input type="text" name="note_<?=$donnees['etudiant_id']?>"></td>
                        </tr>
                    <?php
                    }
                    $reponse->closeCursor(); // termine le traitement de la requete
                    ?>
                </table>
              </div>
                <input type="submit" class="btn btn-default" name="submit"></button>
            </form>
        </div>
    </div>
	 <a href="enseignement.php" class="btn btn-connexion">Retour</a>
    <?php }

    else { ?>
        <div class="container">
            <div class="jumbotron enseignant">
                    <div class="input-group2">
                        <form method="post">
                            <label class="label label-enseignant" for="date_exam">Saisissez la date de l'évaluation</label><br />
                            <input class="form-control" type="date" name="date_exam" required><br />
                            <label class="label label-enseignant" for="type_exam">Saisissez le type d'evaluation</label><br />
                            <select class="form-control" name="type_exam" required>
                               <option value="3">Rattrapage</option>
                               <option value="1">Controle continu</option>
                               <option value="2">Partiel</option>
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
