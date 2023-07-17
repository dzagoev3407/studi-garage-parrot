<?php
include('../../bdd/cnx.php');

if(isset($_POST['envoyer']))
{
  $nom = $_POST['nom'];
  $commentaires = $_POST['commentaires'];
  $note = $_POST['note'];
  $verif = 'non';

  if(!empty($nom) && !empty($commentaires) && !empty($note))
  {
    $sqlCommentaires = "INSERT INTO `garage_commentaires`(`nom`, `commentaires`, `note`, `verif`) 
                        VALUES (:nom, :commentaires, :note, :verif)";

    $reqCommentaires = $db->prepare($sqlCommentaires);

    $reqCommentaires->bindvalue(':nom', $nom);
    $reqCommentaires->bindvalue(':commentaires', $commentaires);
    $reqCommentaires->bindvalue(':note', $note);
    $reqCommentaires->bindvalue(':verif', $verif);

    $envoiCommentaires = $reqCommentaires->execute();

    if($envoiCommentaires)
    {
      ?>
        <div class="alert alert-success" role="alert">
          <h1 class="text-center">ALERTE</h1>
          <p class="text-center">Votre commentaire a bien été posté ! On vous remercie de votre confiance !</p>
          <div class="text-center">
            <a href="../../index.php"><button class="btn btn-primary">Retour à l'accueil</button></a>
          </div>
        </div>
      <?php
    }
    else
    {
      ?>
        <div class="alert alert-danger" role="alert">
          <h1 class="text-center">ALERTE</h1>
          <p class="text-center">Votre commentaire n'a pas été posté ! Veuillez réessayez !</p>
        </div>
      <?php
    }
  }
}

/* Afficher les commentaires */

$sqlCommentairesDisplay = "SELECT * FROM `garage_commentaires` 
                           ORDER BY `id` 
                           DESC LIMIT 5";

$reqCommentairesDisplay = $db->query($sqlCommentairesDisplay);

$displayCommentaire = $reqCommentairesDisplay->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
  <title>Garage de Vincent Parrot</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../assets/css/styles.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
  <!-- Icon FONTAWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css">
  <!-- Icon Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

