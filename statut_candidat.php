<?php
if(isset($_POST["valider"]))
{
  if(!empty($_POST['statut_candidature'])) {
    $query = " UPDATE etudiant
              SET statut_candidature = :statut_candidature, promo_id = :promo_id
              WHERE etudiant_id = :etudiant_id";

    $param = array(
      'statut_candidature' => $_POST['statut_candidature'],
      'promo_id' => $_POST['promo_id'],
      'etudiant_id' => $_POST['etudiant_id'],
      );
    $req = $connexion->prepare($query);
    $req->execute($param);
    }
}
?>
