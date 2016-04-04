<header class="navbar navbar-inverse navbar-fixed-top wet-asphalt" role="banner">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Ecole Internationale du Vin</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="accueil.php">EIV</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="accueil.php">Accueil</a></li>

				<?php
				if(isset($_SESSION['login'])) {

					if($_SESSION['rang'] == '1') {
						echo '
						<li><a href="pedagogie.php">Pédagogie</a></li>
						<li><a href="exclusion.php">Exclusions</a></li>
						<li><a href="bulletin.php">Bulletins</a></li>
						<li><a href="eleves.php">Elèves</a></li>
						<li><a href="deconnexion.php">Déconnexion</a></li>';
					}

					elseif ($_SESSION['rang'] == '2') {
						echo '
						<li><a href="enseignement.php">Enseignant</a></li>
						<li><a href="exclusion.php">Notes</a></li>
						<li><a href="absence.php">Absences & Retards</a></li>
						<li><a href="deconnexion.php">Déconnexion</a></li>';
					}
					elseif ($_SESSION['rang'] == 3 ) {
						echo '
						<li><a href="scolarite.php">Scolarité</a></li>
						<li><a href="saisie_notes.php">Notes</a></li>
						<li><a href="bulletin.php">Absences & Retards</a></li>
						<li><a href="exclusion.php">Exclusions</a></li>
						<li><a href="bulletin.php">Bulletins</a></li>
						<li><a href="deconnexion.php">Déconnexion</a></li>';
					}
					else {
						echo '
						<li><a href="candidature.php">Candidat</a> </li>
						<li><a href="deconnexion.php">Déconnexion</a></li>';
					}
				}
				else {
					echo '
					<li><a href="inscription.php">Inscription</a></li>
					<li><a href="connexion.php">Connexion</a></li>';
				}
				?>
			</ul>
		</div>
	</div>
</header><!--/header-->';
