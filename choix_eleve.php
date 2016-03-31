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
				<?php if(isset($_POST['promo'])) {?>
				            <?php
				            $_SESSION['promo'] = $_POST['promo'];
				            $promo = $_SESSION['promo'];
				            // on récupère le contenu de la table eleve
				            $reponse = $connexion->query('SELECT * FROM etudiant WHERE promo_id = '.$promo.' ORDER BY etudiant_nom');

				            ?>
				            <form method="post" action="bulletin.php">
				              <div class="panel panel-default">
				              <div class="panel-heading">Generation bulletins</div>
				                <table class="table">
				                    <tr><td>Elèves</td><td>Statut bulletin</td><td>Voir/Modifier</td></tr>
				                    <?php
				                    // on affiche chaque entrée

				                    while ($donnees = $reponse->fetch())


				                    {
				                        $bull = $connexion->query('SELECT statut FROM bulletin  WHERE etudiant_id = '.$donnees['etudiant_id'].'  ');
				                        $statut =$bull->fetch();
				                        ?>
				                        <tr>
				                            <td><?=$donnees['etudiant_nom'].' '.$donnees['etudiant_prenom']?>
				                            </td>
				                            <?php

				                                if($statut['statut']=='genere')
				                                { ?>
				                                    <td>Généré</td>
				                                    <td><input type="submit" class="btn btn-default" name="<?=$donnees['etudiant_id']?>" value="Voir"></button></td><?php
				                                }

				                                else
				                                { ?>
				                                    <td>Non généré</td>
				                                    <td><input type="submit" class="btn btn-default" name="<?=$donnees['etudiant_id']?>" value="Générer"></button></td><?php
				                                } ?>
				                        </tr>
				                    <?php
				                    }
				                    $reponse->closeCursor(); // termine le traitement de la requete
				                    ?>
				                </table>
				              </div>
				            </form>
				        </div>
				    </div>
				    <?php }

				    else { ?>
				        <div class="container">
				            <div class="jumbotron enseignant">
				                    <div class="input-group2">
				                        <form method="post">
				                            <label class="label label-enseignant" for="promo" style="color: black">Choisissez la promo</label><br />
				                            <select class="form-control" name="promo" required>
				                               <option value="300">promo 2013</option>
				                               <option value="301">promo 2014</option>
				                               <option value="302">promo 2015</option>
				                            </select>
				                            <input type="submit" class="btn btn-default" name="submit"></input>
				                        </form>
				                    </div>
				            </div>
				        </div>
				<?php
				    }
				?>
        </div>
		   <a href="administration.php" class="btn btn-connexion">Retour</a>
      </div>
			</div>
		</div>
	</div>
	</section>
