<?php
session_start();
$email = $_SESSION['email'];
include('../bdd/cnx.php');
include('../admin/form/commentaires.php');
include('../admin/car/displayCar.php');

function noCnx()
{
    ?>
        <div class="alert alert-danger" role="alert">
            <h1 class="text-center">ALERTE</h1>
            <p class="text-center">Cette page est réservée aux employés de cette entreprise ! Si vous en êtes un veuillez vous connecter <a href="cnx-employes.php">ici</a></p>
        </div>
    <?php
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Espace employés - Garage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css">
  <!-- Bootstrap ICON -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <!-- FontAwesome ICON -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<?php

if($email)
{
    ?>
    <header class="header-cnx-admin">
        <h1>Espace employés - Garage</h1>
    </header>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Administration</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#" id="#add-option" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ajouter</a>
        <div class="dropdown-menu" aria-labelledby="add-option">
            <a class="dropdown-item" href="car/addCar.php">Un véhicule</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" id="#modify-option" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Modifier</a>
        <div class="dropdown-menu" aria-labelledby="modify-option">
            <a class="dropdown-item" href="#" id="modifyVehicules">Un véhicule</a>
        </div>
      </li>
      <li class="nav-item">
        <a href="logout.php"><button class="btn btn-danger">Déconnexion</button></a>
      </li>
      <p class="text-dark">Connecté en tant que : <?php echo $email ?></p>
    </ul>
  </div>
</nav>

<h2 class="text-center">Tout gérer</h2>

<h3>Nos véhicules disponibles :</h3>

<table class="table table-striped">
  <thead>
      <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Année</th>
        <th>Kilométrage</th>
        <th>Action</th>
      </tr>
  </thead>
    <?php foreach($cars as $car): ?>
<tbody>
  <tr>
    <td><?php echo $car['id'] ?></td>
    <td><?php echo $car['nom'] ?></td>
    <td><?php echo $car['prix'] ?></td>
    <td><?php echo $car['annee'] ?></td>
    <td><?php echo $car['kilometrage'] ?></td>
    <?php $id = $car['id']; ?>
    <td><a class="text-decoration-none text-white" href="car/delete.php?id=<?php echo $id ?>"><button class="btn btn-danger">Supprimer</a></button></td>
  </tr>
</tbody>
<?php endforeach; ?>
</table>

<!--Ceci affiche les commentaires à vérifier -->
<?php foreach($displayCommentaire as $displayCommentaires): ?>

<?php if($displayCommentaires['verif'] == 'non')
{
  ?>
  <h3>Tout les commentaires à vérifier :</h3>
  <div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php echo $displayCommentaires['nom'] ?></h5>
        <p class="card-text"><?php echo $displayCommentaires['commentaires'] ?></p>
        <?php $id = $displayCommentaires['id'] ?>
        <a href="deleteCommentaires.php?id=<?php echo $id ?>"><button class="btn btn-danger">Décliner</button></a>
        <a href="approuvCommentaires.php?id=<?php echo $id ?>"><button class="btn btn-success" name="approuv">Approuver</button></a>
      </div>
    </div>
  </div>
  <?php
}
?>

<?php endforeach; ?>
    <?php

}
else
{
    noCnx();
}

?>


</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../assets/js/script.js"></script>
</html>