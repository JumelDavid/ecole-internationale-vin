<?php
            if(isset($_POST) && isset($_POST['login']) AND isset($_POST['pass'])){
                $y = $connexion->prepare('SELECT COUNT(*) FROM eleve WHERE login = ?');
                $y->execute(array($_POST['login']));
                $x = $y->fetch();
                if ($x[0] == 0){
                    echo 'Ce login n\'existe pas';
                }else{
                    $e = $connexion->prepare('SELECT password FROM eleve WHERE login = ?');
                    $e->execute(array($_POST['login']));
                    $rep = $e->fetch();
                    $passe = sha1($_POST['pass']);

                    if ($passe == $rep['password']){
                        session_start();
                        $_SESSION['utilisateur'] = $_POST['login'];
                        header('Location: membre.php');
                    }else{
                        echo 'Mot de passe incorrect';
                    }
                }

            }
        ?>
