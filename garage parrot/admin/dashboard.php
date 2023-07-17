<?php
session_start();
$email = $_SESSION['email'];
include('../bdd/cnx.php');

/* Script pour afficher les véhicule disponible dans la BDD */

include('car/displayCar.php');

/* Script pour afficher le nombre de véhicule disponible dans la BDD */

include('car/count.php');

/* Script pour afficher le nombre d'employés inscrit dans la BDD */

include('employes/count.php');

/* Script pour afficher le nombre d'administrateur disponible dans la BDD */

include('count.php');

/* Afficher les administrateurs */

include('display.php');

/* Afficher les employés */

include('employes/display.php');

/* Générer message erreur */

function errorMessage()
{
  ?>

  <div class="alert alert-danger" role="alert">
      <h1 class="text-center">ALERTE</h1>
      <p>Cette page est réservée aux administrateurs de ce site !</p>
  </div>

  <?php
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Administrateur - Garage</title>
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
    <h1>Espace admin - Accueil</h1>
  </header>

  <section class="admin-logged-message">
      <p class="text-right text-white">Connecté en tant que : <strong><?php echo $email ?></strong><p>
      <a href="logout.php"><button class="btn btn-danger text-white"><i class="bi bi-box-arrow-right"></i>Déconnexion</button></a>
  </section>

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
            <a class="dropdown-item" href="addAdmin.php">Administrateur</a>
            <a class="dropdown-item" href="car/addCar.php">Un véhicule</a>
            <a class="dropdown-item" href="employes/addEmployes.php">Un compte employé</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" id="#modify-option" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Modifier</a>
        <div class="dropdown-menu" aria-labelledby="modify-option">
            <a class="dropdown-item" href="#" id="modifyAdmin">Administrateurs</a>
            <a class="dropdown-item" href="#" id="modifyVehicules">Un véhicule</a>
            <a class="dropdown-item" href="#" id="modifyEmployes">Un employé</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" id="#modify-option" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
        <div class="dropdown-menu" aria-labelledby="modify-option">
            <a class="dropdown-item" href="services/addServices.php" target="_blank">Ajouter</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="container mt-5">
  <h1 class="mb-4">Statistiques :</h1>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="text-center icon-stats">
            <i class="fa-solid fa-car"></i>
          </div>
          <h5 class="card-title text-center">Véhicules disponibles</h5>
          <p class="card-text text-center desc-stats">Nombre : <span id="vehicle-count"><?php echo $totalCountCar ?></span></p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="text-center icon-stats">
            <i class="fa-sharp fa-solid fa-users"></i>
          </div>
          <h5 class="card-title text-center">Employés inscrits</h5>
          <p class="card-text text-center desc-stats">Nombre : <span id="member-count"><?php echo $totalCountEmployes ?></span></p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <div class="text-center icon-stats">
            <i class="fa-solid fa-user-tie"></i>
          </div>
          <h5 class="card-title text-center">Administrateurs</h5>
          <p class="card-text text-center desc-stats">Nombre : <span id="admin-count"><?php echo $totalCountAdmin ?></span></p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<?php include('../include/footer.php'); ?>

<!-- MODAL Contenus -->

<!--Modal admin : -->

<div class="modal fade" id="adminModal" tabindex="-1" role="dialog" aria-labelledby="adminModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="adminModalLabel">Administrateurs</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Mot de passe</th>
                <th>Action</th>
              </tr>
            </thead>
            <?php foreach($displayAdmin as $displayAdmins): ?>
            <tbody>
              <tr>
                <td><?php echo $displayAdmins['id'] ?></td>
                <td><?php echo $displayAdmins['email'] ?></td>
                <td><?php echo $displayAdmins['mdp'] ?></td>
                <td><a href="delete.php?id=<?php echo $displayAdmins['id']; ?>"><button class="btn btn-danger">Supprimer</button></a></td>
              </tr>
            </tbody>
            <?php endforeach; ?>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>

<!--- Fin de la Modal admin --->

<!--Modal employés : -->

<div class="modal fade" id="employesModal" tabindex="-1" role="dialog" aria-labelledby="employesModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="employesModalLabel">Employés</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Action</th>
              </tr>
            </thead>
            <?php foreach($displayEmploye as $displayEmployes): ?>
            <tbody>
              <tr>
                <td><?php echo $displayEmployes['id'] ?></td>
                <td><?php echo $displayEmployes['nom'] ?></td>
                <td><?php echo $displayEmployes['prenom'] ?></td>
                <td><?php echo $displayEmployes['email'] ?></td>
                <?php $id = $displayEmployes['id']; ?>
                <td><a class="text-decoration-none text-white" href="employes/delete.php?id=<?php echo $id ?>"><button class="btn btn-danger">Supprimer</a></button></td>
              </tr>
            </tbody>
            <?php endforeach; ?>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>

<!--- Fin de la Modal employés --->

<!--Modal véhicule : -->

<div class="modal fade" id="vehiculeModal" tabindex="-1" role="dialog" aria-labelledby="vehiculeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="vehiculeModalLabel">Véhicules</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>

<!-- Fin de la modal véhicule -->


<?php
}
else
{
    errorMessage();
}

?>
</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../assets/js/script.js"></script>
</html>