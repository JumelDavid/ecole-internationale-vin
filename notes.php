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
				<?php
	            print_r($_SESSION);
	            foreach ($_POST as $key => $value) {
	                $id=substr($key, 5);
	                echo $id;
	                echo ' note :' .$value.'<br>';
	                //$saisie = $connexion->query('INSERT INTO note (note_valeur, note_date, etudiant_id, matiere_id, evaluation_id)  VALUES ('.$value.', '.$_SESSION['date_exam'].',  '.$id.', '.$_SESSION['matiere'].', '.$_SESSION['type_exam'].' )');


	                 $req = $connexion->prepare('INSERT INTO note (note_valeur, note_date, etudiant_id, matiere_id, evaluation_id)
	            VALUES(:note_valeur, :note_date, :etudiant_id, :matiere_id, :evaluation_id)');

	            $req->execute(array(
	                'note_valeur' => $value,
	                'note_date' => $_SESSION['date_exam'],
	                'etudiant_id' => $id,
	                'matiere_id' => $_SESSION['matiere'],
	                'evaluation_id' => $_SESSION['type_exam']
	              ));

	            }
	            ?>
   </div>
	</div>
	</div>
	</section>
   <?php require "includes/footer.php" ?>
