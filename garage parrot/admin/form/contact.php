<?php
include('../../bdd/cnx.php');

if(isset($_POST['btn_envoi']))
{
  $email = $_POST['email_champ'];
  $sujet = $_POST['sujet_champ'];
  $message = $_POST['message_champ'];

  if(!empty($email) && !empty($sujet) && !empty($message))
  {
    $sqlContactForm = "INSERT INTO `garage_contact`(`email`, `sujet`, `message`) 
                       VALUES (:email , :sujet, :message)";

    $reqContactForm = $db->prepare($sqlContactForm);

    $reqContactForm->bindvalue(':email', $email);
    $reqContactForm->bindvalue(':sujet', $sujet);
    $reqContactForm->bindvalue(':message', $message);

    $envoiContactForm = $reqContactForm->execute();

    if($envoiContactForm)
    {
      ?>

        <div class="alert alert-success" role="alert">
          <h1 class="text-center">ALERTE</h1>
          <p class="text-center">Message bien envoyé ! Nous vous répondrons dans les plus brefs délais !</p>
        </div>
        <a href="../../index.php"><button class="btn btn-primary">Retour</button></a>

      <?php
    }
    else
    {
      ?>

        <div class="alert alert-danger" role="alert">
          <h1 class="text-center">ALERTE</h1>
          <p class="text-center">Message non envoyé ! Veuillez réessayez</p>
        </div>
        <a href="../../index.php"><button class="btn btn-primary">Retour</button></a>

      <?php
    }
  }
}
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