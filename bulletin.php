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
			<?php

   print_r($_SESSION);
   if (isset($_POST)){
		 foreach ($_POST as $key => $value) {
		 $_SESSION['etudiant_id'] = $key;
		 }
   }
   $id = $_SESSION['etudiant_id'];
   $bulletin = $connexion->query('SELECT appreciation,statut FROM bulletin WHERE etudiant_id = '.$id.' ');
   $gen = $bulletin->fetch();
   if ($gen['statut'] == 'genere')
		 { ?>


		 <div id="titre">
			  <h1>Votre bulletin de note</h1>
		 </div>
		 <?php
		 $id = $_SESSION['etudiant_id'];
		 $reponse = $connexion->query('SELECT note_valeur, matiere_nom, matiere_id FROM note NATURAL JOIN matiere WHERE etudiant_id = '.$id.' GROUP BY matiere_id ORDER BY matiere_id');
		 $matiere = $connexion->query('SELECT * FROM matiere');
		 $evaluation = $connexion->query('SELECT * FROM evaluation');
		  ?>
		 <table class="table">
		  <tr><td>matieres</td><td>moyenne</td><td>notes(coeff)</td></tr>
						 <?php
						 $cpt1 = 0;
						 $cpt2 = 0;
						 // on affiche chaque entrée
						 while ($donnees = $reponse->fetch())
						 {?>
							  <tr>
									<td><?=$donnees['matiere_nom']?></td>
									<?php $m = $donnees['matiere_id'] ; ?>

									<td>
										 <?php $moyenne = $connexion->query ('SELECT SUM(note_valeur * evaluation_coeff) / SUM(evaluation_coeff) AS "moyenne" FROM note NATURAL JOIN evaluation WHERE etudiant_id = '.$id.' AND matiere_id = '.$m.'');
										 $avg = $moyenne->fetch();
										 echo ROUND($avg['moyenne'],2);
										 $cpt1 += ROUND($avg['moyenne'],2);
										 $cpt2 +=1;
										 ?>
									</td>
									<td>
										 <table><tr>
										 <?php $note = $connexion->query('SELECT note_valeur, evaluation_coeff FROM note NATURAL JOIN evaluation WHERE etudiant_id = '.$id.' AND matiere_id = '.$m.' ');
									while ($n = $note->fetch()){echo '<td>' . $n['note_valeur'].'('.$n['evaluation_coeff'].')</td>';}?>
										 </tr></table>
										 <!-- moyenne SELECT SUM(note_valeur * evaluation_coeff) / SUM(evaluation_coeff) FROM note NATURAL JOIN evaluation WHERE etudiant_id = 3 AND matiere_id = 1600 -->
							  </td>

							  </tr>

						 <?php
						 } ?>
							  <tr>
									<td>Moyenne generale / Appreciation</td>
									<td><?php echo ROUND(($cpt1/$cpt2),2)?></td>
									<td><?=$gen['appreciation']?></td>
							  </tr>
							  <?php
						 $reponse->closeCursor(); // termine le traitement de la requete
						 ?>
   </table>

   <table>
		 <tr>
			  <?php
			  $abs = $connexion->query('SELECT COUNT(absence_id) AS cnt FROM absence WHERE etudiant_id = '.$id.' ' );
			  // Pour la gestion des absence, ne sachant pa comment m'y prendre, je suis parti sur une base de 4h de cours par demi journées, je divise donc le total d'absences par 4 et je sors le resultat sous frome de demi journées. Point à amélirer.
			  ?>

			  <td>Absences</td>
			  <td><?php $a=$abs->fetch();
					echo ROUND(($a['cnt'])/4); ?></td>
		 </tr>

		 <tr>


		 </tr>

   </table>
		 <a href="../docs/bulletin.docx">Téléchargez votre bulletin.</a>
		 <?php }
		 else {
			  echo 'Votre bulletin n\'a pas encore été généré !' ;
		 }
		 ?>
   </div>
	</div>
	</div>
	</section>
   <?php require "includes/footer.php" ?>
