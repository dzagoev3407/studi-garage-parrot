<section>
  <div class="container">
    <div class="row">
      <?php foreach($carsCinqDernier as $carsCinqDerniers): ?>
        <div class="col-md-4">
          <div class="card">
            <?php $imagePath = 'admin/car/imgCar/'.$carsCinqDerniers['image']; ?>
            <img class="card-img-top" src="<?php echo $imagePath; ?>" alt="Car 1">
            <div class="card-body">
              <h5 class="card-title"><?php echo $carsCinqDerniers['nom'] ?></h5>
              <p class="card-text">Année de mise en circulation: <?php echo $carsCinqDerniers['annee']; ?></p>
              <p class="card-text">Kilométrage: <?php echo $carsCinqDerniers['kilometrage']; ?> km</p>
            </div>
            <div class="card-footer">
              Prix: <?php echo $carsCinqDerniers['prix']; ?> €
              <div class="text-center">
                <button class="btn btn-danger" onclick="showCarDetails('<?php echo $carsCinqDerniers['nom']; ?>', '<?php echo $carsCinqDerniers['annee']; ?>', '<?php echo $carsCinqDerniers['kilometrage']; ?>', '<?php echo $carsCinqDerniers['prix']; ?>', '<?php echo $imagePath ?>')">Voir +</button>
              </div>
          </div>
            </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="text-center">
    <a href="pageCar.php" target="_blank"><button class="btn text-white" style="background-color: #D92332">Voir +</button></a>
  </div>
</section>