<!DOCTYPE html>
<html lang="fr">

<?php require 'includes/head.php'; ?>

<body>

<?php require 'includes/navbar.php'; ?>

    <section id="main-slider" class="no-margin">
        <div class="carousel slide wet-asphalt">
            <ol class="carousel-indicators">
                <li data-target="#main-slider" data-slide-to="0" class="active"></li>
                <li data-target="#main-slider" data-slide-to="1"></li>
                <li data-target="#main-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(images/slider/slide1.jpg)">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="carousel-content centered">
                                    <h2 class="animation animated-item-1">Ecole Internationale du Vin</h2>
                                    <h4 class="animation animated-item-2">Bienvenue sur le site de l'EIV, découvrez notre formation</h4>
												<br>
												<a class="btn btn-md animation animated-item-3" href="ecole.php">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
                <div class="item item-2" style="background-image: url(images/slider/slide2.jpg)">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content centered">
                                    <h2 class="boxed animation animated-item-1">Ecole Internationale du Vin</h2>
                                    <h4 class="boxed animation animated-item-2">Bienvenue sur le site de l'EIV, découvrez notre formation</h4>
                                    <br>
                                    <a class="btn btn-md animation animated-item-3" href="ecole.php">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
                <div class="item item-3" style="background-image: url(images/slider/slide3.jpg)">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="carousel-content centered">
                                    <h2 class="boxed animation animated-item-1">Ecole Internationale du Vin</h2>
                                    <h4 class="boxed animation animated-item-2">Bienvenue sur le site de l'EIV, découvrez notre formation</h4>
                                    <a class="btn btn-md animation animated-item-3" href="ecole.php">En savoir plus</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/.item-->
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
        <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
            <i class="icon-angle-left"></i>
        </a>
        <a class="next hidden-xs" href="#main-slider" data-slide="next">
            <i class="icon-angle-right"></i>
        </a>
    </section><!--/#main-slider-->

    <section id="services" class="emerald">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="media">
                        <div class="pull-left">
                            <i class="icon-glass icon-md"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Etudier dans un cadre idéal</h3>
                            <p>Première consommatrice et exportatrice de vin dans le monde, la France s'est imposée comme terre d'accueil d'une École dédiée
										 à la formation d'oenologues confirmé(e)s. Située sur les bords de la Garonne, l'Ecole Internationale du Vin de Bordeaux (en Gironde)
										 dispose de locaux à la pointe de la technologie et d'un environnement de travail comme nulle part ailleurs.</p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->
                <div class="col-lg-4">
                    <div class="media">
                        <div class="pull-left">
                            <i class="icon-thumbs-up icon-md"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Un secteur en constant développement</h3>
                            <p>La filière viticole, dont les exigences professionnelles et internationales se sont fortement accrues, recherche des
										 jeunes passionnés et avides d'apprendre. Le domaine de l'Oenologie étant en plein expension, nous misons sur l'avenir de la profession
										 en proposant un cursus accessible dès l'obtention du Baccalauréat!</p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->
                <div class="col-lg-4">
                    <div class="media">
                        <div class="pull-left">
                            <i class="icon-user icon-md"></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Un cursus evolutif</h3>
                            <p>Le cursus de cette écolé est très simple. Sur 5 ans d'études, vos 2 premières années sont exclusivement consacrées à la découverte de cette
										 filière viticole. La formation se déroulant en continue jusqu'au passage d'un examen validant un Bac+2 et vous ouvre la voie vers les
										 3 années supérieures. Au cours de ces 3 années, vous aurez la possibilité de réaliser vos études en alternance. De nombreuses entreprises
										 et grands chateaux, partenaires de notre école, vous accueilleront une semaine sur deux ainsi que pendant toutes les périodes de
										 fermeture de l'école.</p>
                        </div>
                    </div>
                </div><!--/.col-md-4-->
            </div>
        </div>
    </section><!--/#services-->

<?php require 'includes/footer.php'; ?>
