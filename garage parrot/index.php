<?php include('bdd/cnx.php'); ?>
<!-- Affichage des voitures -->
<?php include('admin/car/displayCar.php'); ?>
<!-- Affichage des horaires  -->
<?php include('admin/services/horaires.php'); ?>
<!-- Traitement du formulaire de contact -->
<?php require 'admin/form/contact.php'; ?>
<!-- Traitement du formulaire des commentaires et les afficher -->
<?php require 'admin/form/commentaires.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Garage de Vincent Parrot</title>
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
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-white" href="#">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="pageCar.php" target="_blank">Vente d'occasion</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="contact.php" target="_blank">Contact</a>
      </li>
    <div class="section-cnx-navbar">
      <div class="admin-link-nav">
        <h5 class="text-white">Administration</h5>
        <a href="admin/cnx-admin.php" target="_blank"><button class="btn btn-primary">Connexion</button></a>
      </div>
      <div class="employes-link-nav">
        <h5 class="text-white">Espace employé</h5>
        <a href="employesSpace/cnx-employes.php" target="_blank"><button class="btn btn-primary">Connexion</button></a>
      </div>
    </div>
    </ul>
  </div>
</nav>

  <div class="jumbotron jumbotron-fluid">
     <div class="container">
        <h1 class="display-4 text-white">Vincent Parrot - Garage Site officiel</h1>
        <p class="lead text-white">Garage situé à Toulouse</p>
    </div>
</div>

<div class="title-services">
    <h2 class="text-center text-white">Nos services</h2>
</div>

<section>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <img class="icon-rep_mecanique" src="assets/img/icons/rep_mecanique.png">
              <h5 class="card-title">Réparation mécanique</h5>
              <p class="card-text">Service de réparation des composants mécaniques tels que le moteur, la transmission, la direction, etc.</p>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <img class="icon-rep_electrique" src="assets/img/icons/rep_electrique.png">
              <h5 class="card-title">Réparation électrique</h5>
              <p class="card-text">Service de réparation des systèmes électriques tels que l'éclairage, les circuits électriques, etc.</p>
            </div>
          </div>
        </div>
        
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <img class="icon-rep_carrosserie" src="assets/img/icons/rep_carrosserie.png">
              <h5 class="card-title">Réparation carrosserie</h5>
              <p class="card-text">Service de réparation des éléments de la carrosserie tels que les pare-chocs, les portières, etc.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<div class="car-occassion">
    <h2 class="text-center text-white">Nos Véhicules d'occasions</h2>
</div>

<?php include('voitureALaUne.php'); ?>

<div class="car-occassion">
    <h2 class="text-center text-white">Les clients parlent de nous !</h2>
</div>

<div id="commentCarousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php foreach($displayCommentaire as $key => $displayCommentaires): ?>
      <li data-target="#commentCarousel" data-slide-to="<?php echo $key; ?>" <?php if ($key == 0) echo 'class="active"'; ?>></li>
    <?php endforeach; ?>
  </ol>

  <div class="carousel-inner">
    <?php foreach($displayCommentaire as $key => $displayCommentaires): ?>
      <div class="carousel-item <?php if ($key == 0) echo 'active'; ?>">
      <?php
      if($displayCommentaires['verif'] == 'oui')
      {
        ?>
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><?php echo $displayCommentaires['nom'] ?></h5>
            <p class="card-text"><?php echo $displayCommentaires['commentaires'] ?></p>
            <p class="card-text"><?php echo $displayCommentaires['note'] ?>/5</p>
          </div>
        </div>
      <?php
      }
      ?>
      </div>
    <?php endforeach; ?>
  </div>
  <a class="carousel-control-prev" href="#commentCarousel" role="button" data-slide="prev">
    <div class="text-danger">
      <i class="bi bi-arrow-left-square-fill"></i>
    </div>
  </a>
  <a class="carousel-control-next" href="#commentCarousel" role="button" data-slide="next">
    <div class="text-danger">
      <i class="bi bi-arrow-right-square-fill"></i>
    </div>
  </a>
</div>

<div class="container">
  <h2>Commenter votre expérience !</h2>
  <form action="admin/form/commentaires.php" method="POST">
    <div class="form-group">
      <label for="nom">Nom :</label>
      <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom">
    </div>
    <div class="form-group">
      <label for="commentaires">Commentaires :</label>
      <textarea class="form-control" id="commentaires" name="commentaires" rows="5" placeholder="Entrez vos commentaires"></textarea>
    </div>
    <div class="form-group">
      <label for="note">Note :</label>
        <select class="form-control" id="note" name="note">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
        </select>
      </div>
        <button type="submit" class="btn btn-primary" name="envoyer">Envoyer</button>
    </form>
  </div>

<div class="contact-section">
    <h2 class="text-center text-white">Nous contacter</h2>
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
  
<!-- Footer -->
<?php include('include/footer.php'); ?>


  <!-- Popup détail véhicules -->
  <div class="modal fade" id="carDetailsModal" tabindex="-1" role="dialog" aria-labelledby="carDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="carDetailsModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img id="carImage" src="<?php $imagePath ?>" alt="Car Image">
            <p id="carDetails"></p>
        </div>
        <div class="modal-footer">
        <div class="text-center">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="assets/js/script.js"></script>
</html>