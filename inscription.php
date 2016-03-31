<!DOCTYPE html>
<html lang="fr">

<?php require 'includes/head.php'; ?>

<body>

<?php require 'includes/navbar.php'; ?>

    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Inscription</h1><br/>
                    <p>Vous desirez nous rejoindre ? Pour cela, rien de plus simple, il vous suffit de remplir ce dossier de candidature afin de postuler
							  dans notre école. Des pièces justificatives vous serons peut être demandé à la suite de la validation de votre dossier par
							  l'équipe administrative.</p>
                </div>
                <div class="col-sm-6">
                        <img src="images/logo2.png" style="width: 40%; float:right;">
                </div>
            </div>
        </div>
    </section><!--/#title-->

	 <section id="formulaire" class="silver">
		 <div class="container">
			  <div class="row">
		 <div class="col-lg-12 center">
			 <form action="" method="post" id="form-inscription">
            <fieldset>
            <h3><span class="label label-primary label-form">VOS COORDONNEES</span></h3>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="input-group">
              <h3><span class="label label-primary label-form">VOUS</span></h3>
                <label>CIVILITE : </label><span class="form"><input required  name="etudiant_sexe" type="radio" value="M." checked> M. <input required name="etudiant_sexe" type="radio" value="Mme."> Mme.</span><br /><br />
                <label>NOM : </label><br /><input required class="form-control" type="text" name="etudiant_nom" value=""><br />
                <label>PRENOM  : </label><br /><input required class="form-control" type="text" name="etudiant_prenom" value=""><br />
                <label>DATE DE NAISSANCE  : </label><br /><input required class="form-control" type="date" name="etudiant_naissance" value=""><br />
                <label>RUE : </label><br /><input required class="form-control" type="text" name="etudiant_rue" value=""><br />
                <label>CODE POSTAL : </label><br /><input required class="form-control" type="text" name="etudiant_cp" value=""><br />
                <label>VILLE : </label><br /><input required class="form-control" type="text" name="etudiant_ville" value=""><br />
                <label>EMAIL : </label><br /><input required class="form-control" type="email" name="etudiant_mail" value=""><br />
                <label>TELEPHONE : </label><br /><input required class="form-control" type="tel" name="etudiant_tel" value=""><br />
                <label>PAYS : </label><br /><input required class="form-control" type="text" name="etudiant_pays" value=""><br />
                <label>NATIONALITE : </label><br /><input required class="form-control" type="text" name="etudiant_nationalite" value=""><br />
            </div>
          </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="input-group">
              <h3><span class="label label-primary label-form">PREMIER TUTEUR </span></h3>
                <label>PRENOM : </label><br /><input class="form-control" type="text" name="tuteur1_prenom" value=""><br />
                <label>NOM : </label><br /><input class="form-control" type="text" name="tuteur1_nom"  value=""><br />
                <label>TELEPHONE : </label><br /><input class="form-control" type="tel" name="tuteur1_tel"  value=""><br />
                <label>RUE : </label><br /><input class="form-control" type="text" name="tuteur1_rue" value=""><br />
                <label>CODE POSTAL : </label><br /><input class="form-control" type="text" name="tuteur1_cp" value=""><br />
                <label>VILLE : </label><br /><input class="form-control" type="text" name="tuteur1_ville"  value=""><br />
                <label>EMAIL : </label><br /><input class="form-control" type="email" name="tuteur1_mail"  value=""><br />
                <label>PROFESSION : </label><br /><input class="form-control" type="text" name="tuteur1_profession" value=""><br />
            </div>
          </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
              <div class="input-group">
              <h3><span class="label label-primary label-form">SECOND TUTEUR</span></h3>
                <label>PRENOM : </label><br /><input class="form-control" type="text" name="tuteur2_prenom" value=""><br />
                <label>NOM : </label><br /><input class="form-control" type="text" name="tuteur2_nom" value=""><br />
                <label>TELEPHONE : </label><br /><input class="form-control" type="tel" name="tuteur2_tel" value=""><br />
                <label>RUE : </label><br /><input class="form-control" type="text" name="tuteur2_rue" value=""><br />
                <label>CODE POSTAL : </label><br /><input class="form-control" type="text" name="tuteur2_cp" value=""><br />
                <label>VILLE : </label><br /><input class="form-control" type="text" name="tuteur2_ville" value=""><br />
                <label>EMAIL : </label><br /><input class="form-control" type="email" name="tuteur2_mail" value=""><br />
                <label>PROFESSION : </label><br /><input class="form-control" type="text" name="tuteur2_profession" value=""><br />
            </div>
          </div>
                <input type="submit" name="envoie" class="btn btn-default btn-inscription" value="Inscription">
            </fieldset>
        </form>
		 </div>
	 </div>
 </div>
	 </section>

   <?php require 'includes/footer.php'; ?>
