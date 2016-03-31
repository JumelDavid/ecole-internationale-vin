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
				  $reponse = $connexion->query('SELECT * FROM etudiant');

				  while ($donnees = $reponse->fetch())
				  {
					 if ($_SESSION['login'] == $donnees['etudiant_pseudo']) {
				  ?>
<h3>PANNEL DE L'ENSEIGNANT</h3>
	<h4>
	<strong>Bienvenue <?php echo $donnees['etudiant_prenom'] . " " . $donnees['etudiant_nom']; ?>
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
				<div class="bandeau">
 <h1><a href="bulletin.php" style="text-align: center;">ACCEDER A VOTRE BULLETIN ></a></h1>
</div>
<div class="bandeau">
 <h1><a href="">LE PLANNING ></a></h1>
</div>
   </div>
	</div>
	</div>
	</section>
   <?php require "includes/footer.php" ?>
