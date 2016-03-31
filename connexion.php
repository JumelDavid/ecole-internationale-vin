<!DOCTYPE html>
<html lang="fr">

<?php require 'includes/head.php'; ?>

<body>

<?php require 'includes/navbar.php'; ?>

    <section id="title" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <h1>Connexion</h1><br/>
                    <p>Renseignez vos identifiants pour vos connecter et accèder à votre espace dédié.<br/>
						  Ce portail vous permettra d'accèder à l'espace candidature, à l'espace scolarité, à l'espace enseignant ou à l'espace
					  pédagogie selon votre rang !</p>
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
			<h3><span class="label label-primary label-form">Connectez-vous</span></h3><br/>
			<form action="includes/login.php" method="post" id="form-login">
				<div class="col-lg-4">
				<div class="input-group2">
			  <label>Pseudo : </label>         <input class="form-control" type="text" name="login"  placeholder="Votre login"><br /></div></div>
			  <div class="col-lg-4">
			  <div class="input-group2">
			  <label>Mot de passe : </label>  <input class="form-control" type="password" name="pass" placeholder="Mot de passe"><br /></div></div>
			<div class="col-lg-2"><input class="btn btn-connexion" type="submit" name="connexion" value="Connexion"></div>
		 </form>
		<div class="col-lg-2"> <a href="inscription.php" class="btn btn-connexion">Vous inscrire</a></div>

		</div>
   </div>
</div>
   </section>


<?php require 'includes/footer.php'; ?>
