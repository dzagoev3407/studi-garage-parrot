<?php include('bdd/cnx.php'); ?>
<?php include('admin/car/displayCar.php'); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Véhicules d'occasion</title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
  <!-- Icon FONTAWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css">
  <!-- Icon Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <style>
    /* Styles CSS */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    
    .car-occasion {
      background-color: #D92332;
      padding: 20px;
      margin-bottom: 20px;
    }
    
    .car-occasion h2 {
      color: #fff;
      margin: 0;
      font-size: 24px;
      text-align: center;
    }
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }
    
    .card {
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
      overflow: hidden;
    }
    
    .card-img-top {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }
    
    .card-body {
      padding: 20px;
    }
    
    .card-title {
      font-size: 18px;
      margin: 0;
      margin-bottom: 10px;
    }
    
    .card-text {
      margin: 0;
      margin-bottom: 5px;
    }
    
    .card-footer {
      background-color: #f4f4f4;
      padding: 10px;
      text-align: center;
    }
    
    .btn-danger {
      background-color: #D92332;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 14px;
      border-radius: 3px;
    }
    
    .btn-danger:hover {
      background-color: #b51d2b;
    }
    
    .text-center {
      text-align: center;
    }
    
    .text-white {
      color: #fff;
    }
  </style>
</head>
<body>
  <div class="car-occasion">
    <h2 class="text-center text-white">Nos Véhicules d'occasion</h2>
  </div>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-light">
    <a class="text-decoration-none" href="index.php"><li class="breadcrumb-item active" aria-current="page">Accueil</li></a>
  </ol>
</nav>

  <section>
    <div class="container">
      <div class="row">
        <?php foreach($cars as $car): ?>
          <div class="col-md-4">
            <div class="card">
              <?php $imagePath = 'admin/car/imgCar/'.$car['image']; ?>
              <img class="card-img-top" src="<?php echo $imagePath; ?>" alt="Car 1">
              <div class="card-body">
                <h5 class="card-title"><?php echo $car['nom'] ?></h5>
                <p class="card-text">Année de mise en circulation: <?php echo $car['annee']; ?></p>
                <p class="card-text">Kilométrage: <?php echo $car['kilometrage']; ?> km</p>
              </div>
              <div class="card-footer">
                Prix: <?php echo $car['prix']; ?> €
                <div class="text-center">
                  <button class="btn btn-danger" onclick="showCarDetails('<?php echo $car['nom']; ?>', '<?php echo $car['annee']; ?>', '<?php echo $car['kilometrage']; ?>', '<?php echo $car['prix']; ?>', '<?php echo $imagePath ?>')">Voir +</button>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- Footer -->
<?php include('include/footer.php'); ?>

  <!-- Popup Modal -->
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
          <div id="carImageContainer"></div>
          <p id="carDetails"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
</html>