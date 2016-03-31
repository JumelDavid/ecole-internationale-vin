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
	$reponse = $connexion->query('SELECT * FROM administration');

	while ($donnees = $reponse->fetch())
	{
	  if ($_SESSION['login'] == $donnees['admin_pseudo']) {
	?>
	<h3>PANNEL D'ADMINISTRATION</h3>
		 <h4>
		 <strong>Bienvenue <?php echo $donnees['admin_prenom'] . " " . $donnees['admin_nom'];  ?>
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
				<div class="col-lg-4">
              <a href="#exclusions"><span class="btn btn-connexion">Saisie des exclusions</span></a></br>
              <p>Saisir les exclusions des élèves</p>
            </div>
            <div class="col-lg-4">
              <a href="choix_eleve.php"><span class="btn btn-connexion">Saisie du bulletin</span></a></br>
              <p>Saisir les bulletins des élèves</p>
            </div>
            <div class="col-lg-4">
              <a href="liste_etudiants.php"><span class="btn btn-connexion">Admission candidats</span></a></br>
              <p>Gérer l'admission d'un candidat</p>
            </div>
			</div>
		</div>
	</div>
	</section>
   <?php require "includes/footer.php" ?>
