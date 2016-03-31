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
                        $id = $connexion->prepare('SELECT etudiant_id FROM etudiant WHERE promo_id = '.$_SESSION['promo'].' ');
                        $id->execute();
                        while ($rep2 = $id->fetch()) {
                            if($_SESSION['rang'] == 2){
                                if (isset($_POST['envoi'])){
                                    if ($_POST['ret_abs'.$rep2['etudiant_id'].''] == 3){

                                        $req = $connexion->prepare('INSERT INTO absence (absence_date, etudiant_id)
                                        VALUES (:date_auj, :etudiant_id)');

                                        $date = date("Y-m-d H:i:s");

                                        $req->execute(array(
                                            'date_auj' => $date,
                                            'etudiant_id' => $_POST['id_'.$rep2['etudiant_id']],
                                        ));
                                    }
                                    else if ($_POST['ret_abs'.$rep2['etudiant_id'].''] == 1){
                                           $req2 = $connexion->prepare('INSERT INTO retard (retard_date, quinze_minutes, etudiant_id)
                                        VALUES (:date_auj, 0, :etudiant_id)');

                                        $date = date("Y-m-d H:i:s");

                                        $req2->execute(array(
                                            'date_auj' => $date,
                                            'etudiant_id' => $_POST['id_'.$rep2['etudiant_id']]
                                        ));
                                    }
                                    else if ($_POST['ret_abs'.$rep2['etudiant_id'].''] == 2){
                                            $req3 = $connexion->prepare('INSERT INTO retard (retard_date, quinze_minutes, etudiant_id)
                                        VALUES (:date_auj, 1, :etudiant_id)');

                                        $date = date("Y-m-d H:i:s");

                                        $req3->execute(array(
                                            'date_auj' => $date,
                                            'etudiant_id' => $_POST['id_'.$rep2['etudiant_id']]
                                        ));
                                    }
                                   $congrat = '<div class="alert alert-success" role="alert">Le formulaire a bien été envoyé avec succés.<br />';
                                }
                            }

                            else{
                                $err = "Vous n'etes pas un professeur, vous ne pouvez pas envoyer ce formulaire.";
                            }

                        if(isset($err)){
                            echo '<div class="alert alert-danger" role="alert"><b>Attention! </b>'.$err.'</div>';
                        }
                        }
                        echo '<br><br><br>' .$congrat;
                        ?>
