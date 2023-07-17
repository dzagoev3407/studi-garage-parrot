<?php
session_start();
include('../../bdd/cnx.php');
$email = $_SESSION['email'];

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

function validateCarAdd()
{
    ?>

  <div class="alert alert-success" role="alert">
      <h1 class="text-center">ALERTE</h1>
      <p>Véhicule ajouté à la BDD !</p>
  </div>

  <?php
}

/* Script pour afficher le nombre de véhicule disponible dans la BDD */

$sqlCountCar = "SELECT COUNT(`id`) AS total FROM `garage_vehicule`";
$reqCountCar = $db->query($sqlCountCar);
$resultCountCar = $reqCountCar->fetch(PDO::FETCH_ASSOC);
$totalCountCar = $resultCountCar['total'];


/* Script ajout du véhicule vers la BDD */

if (isset($_POST['add'])) 
{
    $prix = $_POST['prix'];
    $image = $_FILES['image']['name'];
    $annee = $_POST['annee'];
    $kilometrage = $_POST['kilometrage'];
    $nom = $_POST['nom'];
  
      // Requête d'insertion des données dans la table "vehicules"
      $sql = "INSERT INTO garage_vehicule (image, prix, annee, kilometrage, nom) VALUES (:image, :prix, :annee, :kilometrage, :nom)";
      $stmt = $db->prepare($sql);
      $stmt->bindvalue(':image', $image);
      $stmt->bindvalue(':prix', $prix);
      $stmt->bindvalue(':annee', $annee);
      $stmt->bindvalue(':kilometrage', $kilometrage);
      $stmt->bindvalue(':nom', $nom);
      $envoi = $stmt->execute();
  
      if($envoi)
      {
        validateCarAdd();
      }
      else
      {
        echo 'Erreur !';
      }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Espace employés - Ajouter un véhicule</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../assets/css/styles.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
</head>
<body>
    

<?php

if($email)
{
    ?>

  <header class="header-cnx-admin">
    <h1>Espace employés - Ajouter un véhicule</h1>
  </header>

  <section class="admin-logged-message">
      <p class="text-right text-white">Connecté en tant que : <strong><?php echo $email ?></strong><p>
  </section>

  <div class="mask" style="background-image: url('https://www.bugatti.com/fileadmin/_processed_/sei/p326/se-image-4b0fafb987aebfe017a9d05fb94c5a7a.jpg');">
      <div class="d-flex justify-content-center align-items-center h-100">
        <div class="text-white">
          <h1 class="mb-3">Véhicules disponible :</h1>
          <h4 class="mb-3 text-center"><?php echo $totalCountCar; ?></h4>
        </div>
      </div>
    </div>
  </div>

  <section>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form method="post" enctype="multipart/form-data">
          <div class="form-group">
              <label for="prix">Nom :</label>
              <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez le nom du véhicule">
            </div>
            <div class="form-group">
              <label for="prix">Prix :</label>
              <input type="text" class="form-control" id="prix" name="prix" placeholder="Entrez le prix du véhicule">
            </div>
            <div class="form-group">
              <label for="image">Image :</label>
              <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="form-group">
              <label for="annee">Année de mise en circulation :</label>
              <input type="text" class="form-control" id="annee" name="annee" placeholder="Entrez l'année de mise en circulation">
            </div>
            <div class="form-group">
              <label for="kilometrage">Kilométrage :</label>
              <input type="text" class="form-control" id="kilometrage" name="kilometrage" placeholder="Entrez le kilométrage">
            </div>
            <button type="submit" class="btn btn-block" name="add">Ajouter</button>
          </form>
        </div>
      </div>
    </div>
  </section>

<div class="text-center">
  <a href="../template.php"><button class="btn btn-primary">Retour</button></a>
</div>

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
</html>