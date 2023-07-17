<?php
include('bdd/cnx.php');
include('admin/services/horaires.php');
$home = 'index.php';

?>

<!DOCTYPE html>
<html>
<head>
  <title>Garage de Vincent Parrot - Contact</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/styles.css">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
  <!-- Icon FONTAWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css">
  <!-- Icon Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
  <header>
    <img class="logo" src="assets/img/logo.jpeg">
  </header>

<nav class="navbar navbar-expand-lg navbar-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a class="text-decoration-none text-white" href="<?php echo $home ?>">Accueil</a></li>
    <li class="text-white breadcrumb-item active" aria-current="page">Contact</li>
  </ol>
</nav>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4 text-white">Contactez-nous</h1>
    <p class="lead text-white">Veuillez remplir ce formulaire pour nous contacter, nous vous répondrons dans les plus brefs délais ! :)</p>
  </div>
</div>

<form action="admin/form/contact.php" method="POST">
  <div class="form-group contact-form">
    <label for="email_champ">Adresse email :</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email_champ" aria-describedby="emailHelp" placeholder="Votre adresse email">
  </div>
  <div class="form-group contact-form">
    <label for="sujet_champ">Sujet</label>
    <input type="text" class="form-control form-champ" id="sujet_champ" name="sujet_champ" placeholder="Sujet du message">
  </div>
  <div class="form-group contact-form">
    <label for="message_champ">Votre message</label>
    <textarea type="text" class="form-control" id="message_champ" name="message_champ" placeholder="Votre message ici"></textarea>
  </div>
  <button type="submit" class="btn btn-primary" name="btn_envoi">Envoyer</button>
</form>

<?php include('include/footer.php') ?>
</body>
</html>