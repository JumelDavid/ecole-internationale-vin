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
				<div class="panel panel-default">
          <div class="panel-heading">GESTION DES CANDIDATURES</div>
          <table class="table">
          <tr><td>ID</td><td>Sexe</td><td>Nom</td><td>Prénom</td><td>Date de Naissance</td>
            <td>Mail</td><td>Statut</td><td>Classe</td><td>Action</td></tr>
          <?php
            $etudiant = $connexion->query('SELECT * FROM etudiant WHERE statut_candidature = "en attente"');
            while ($donnees = $etudiant->fetch())
            {

              $datenaissance = new DateTime($donnees['etudiant_naissance']);

              echo
              '<tr><td> '.htmlspecialchars($donnees["etudiant_id"]).' </td><td class="sexe"> ' .htmlspecialchars($donnees["etudiant_sexe"]). '</td><td>' .htmlspecialchars($donnees["etudiant_nom"]).
              '</td><td>' .htmlspecialchars($donnees["etudiant_prenom"]). '</td><td>'	.$datenaissance->format("d-m-Y").
              '</td><td>' .htmlspecialchars($donnees["etudiant_mail"]). '</td>
              <form method="post" action="liste_etudiants.php"><td>
              <input type="checkbox" name="statut_candidature" value="Admis"> Admis</br>
              </td>
              <td><select class="form-control" name="promo_id" required>
                 <option value="NULL">Aucune</option>
                 <option value="300">EIV1</option>
                 <option value="301">EIV2</option>
                 <option value="302">EIV3</option>
              </select></td>
              <td><input type="submit" class="btn btn-default validcandidat" name="valider"></td>
              <input type="hidden" name="etudiant_id" value="'.$donnees["etudiant_id"].'"></form>
              </tr>';
          } ?>

        </table>
        </div>
		   <a href="administration.php" class="btn btn-connexion">Retour</a>
      </div>
			</div>
		</div>
	</div>
	</section>
