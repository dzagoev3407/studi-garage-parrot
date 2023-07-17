<footer>
<div class="container">
<div class="row align-items-start">
    <div class="col">
      <h4>Nos horaires :</h4>
    <?php foreach($displayHoraires as $displayHoraire): ?>
      <p><?php echo $displayHoraire['jour'] ?> <?php echo $displayHoraire['matin'] ?> <?php echo $displayHoraire['aprem'] ?></p>
    <?php endforeach; ?>
    </div>
    <div class="col">
      <h4>Pages :</h4>
      <ul class="list-group link-page">
        <a class="text-decoration-none text-white" href="admin/cnx-admin.php" target="_blank"><li class="list-footer">Espace administration</li></a>
        <a class="text-decoration-none text-white" href="employesSpace/cnx-employes.php" target="_blank"><li>Espace employés</li></a>
        <a class="text-decoration-none text-white" href="contact.php" target="_blank"><li>Contact</li></a>
      </ul>
    </div>
    <div class="col">
      <h4>Ou nous trouver ?</h4>
      <p>54 avenue du 8 mai, 31000 Toulouse</p>
    </div>
  </div>
</div>
<div class="col-md-12">
    &copy; <?php echo date('Y') ?> Garage de Vincent Parrot. Tous droits réservés.
</div>
</footer>