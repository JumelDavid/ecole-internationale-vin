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
				<div class="col-lg-6">
				          <a href="saisie_notes.php"><span class="btn btn-connexion">Saisie des notes</span></a>
				          <p>Saisissez les notes des élèves pour la matière <?php echo $donnees['matiere_nom']; ?></p>
				        </div>
				        <div class="col-lg-6">
				          <a href="absence.php"><span class="btn btn-connexion">Saisie des absences</span></a>
				          <p>Saisissez les absences des elèves pour la matière <?php echo $donnees['matiere_nom']; ?></p>
				        </div>
			</div>
		</div>
	</div>
	</section>
   <?php require "includes/footer.php" ?>
