<?php
session_start();
$email = $_SESSION['email'];
include('../../bdd/cnx.php');
include('horaires.php');

/* Modal hoaraires */

function horaires()
{
  ?>
   <label for="day-select">Choissisez un jour de la semaine :</label>
        <select name="day" id="day-select">
          <option value="">-- Jours --</option>
          <option value="Lundi">Lundi</option>
          <option value="Mardi">Mardi</option>
          <option value="Mercredi">Mercredi</option>
          <option value="Jeudi">Jeudi</option>
          <option value="Vendredi">Vendredi</option>
          <option value="Samedi">Samedi</option>
          <option value="Dimanche">Dimanche</option>
        </select>

        <label for="horaires-matin">Choissisez un plage horaire (matin) :</label>
        <select name="horaires-matin" id="horaires-matin">
          <option value="">-- Horaires --</option>
          <option value="08:45 - 12:00">08:45 - 12:00</option>
          <option value="Fermé">Fermé</option>
        </select>

        <label for="horaires-aprem">Choissisez un plage horaire (après-midi) :</label>
        <select name="horaires-aprem" id="horaires-aprem">
          <option value="">-- Horaires --</option>
          <option value="14:00 - 18:00">14:00 - 18:00</option>
          <option value="Fermé">Fermé</option>
        </select>
    <?php
}

?>

<div class="modal" id="horaires" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ajouter des horaires</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <div class="modal-body">
      <form method="POST">
        <?php horaires(); ?>
    </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="add-horaires">Ajouter</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php

/* Traitement et envoi des horaires dans la BDD */

if(isset($_POST['add-horaires']))
{
  $day = $_POST['day'];
  $horairesMatin = $_POST['horaires-matin'];
  $horairesAprem = $_POST['horaires-aprem'];

  if($day && $horairesMatin && $horairesAprem)
  {
    $sqlHoraires = "INSERT INTO `garage_horaires`(`jour`, `matin`, `aprem`) 
                    VALUES (:jour, :matin, :aprem)";

    $reqHoraires = $db->prepare($sqlHoraires);

    $reqHoraires->bindvalue(':jour', $day);
    $reqHoraires->bindvalue(':matin', $horairesMatin);
    $reqHoraires->bindvalue(':aprem', $horairesAprem);

    $envoiHoraire = $reqHoraires->execute();

    if($envoiHoraire)
    {
        ?>
        
        <div class="alert alert-success" role="alert">
          <h1 class="text-center">ALERTE</h1>
          <p class="text-center">Horaires du <?php echo $day ?> a bien été ajouté a notre BDD !</p>
        </div>

      <?php
      }
    }
    else
    {
      ?>

        <div class="alert alert-danger" role="alert">
          <h1 class="text-center">ALERTE</h1>
          <p class="text-center">Horaires non ajouté !</p>
        </div>
        
      <?php
    }
}
else
{
  
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Administrateur - Ajouter horaires</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../assets/css/styles.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
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
        <h1>Espace admin - Ajouter un service</h1>
    </header>
  <div class="text-center">
    <?php

    ?>
    <button class="btn btn-danger" id="btnAddHoraires" name="addHoraires" onclick="addHoraires()">Ajouter des horaires</button>
    <button class="btn btn-danger">Ajouter des services au garage</button>
  </div>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4>Nos horaires</h4>
          <?php foreach($displayHoraires as $displayHoraire): ?>
              <div class="horaires">
                <ul>
                  <li><?php echo $displayHoraire['jour'] ?> matin : <?php echo $displayHoraire['matin'] ?> après-midi : <?php echo $displayHoraire['aprem'] ?></li>
                </ul>
          <?php endforeach; ?>
        </div>
        <div class="col-md-12">
          &copy; <?php echo date('Y') ?> Garage de Vincent Parrot. Tous droits réservés.
        </div>
      </div>
    </div>
  </footer>
  <?php
}
else
{
    ?>

    <div class="alert alert-danger" role="alert">
        <h1 class="text-center">ALERTE</h1>
        <p class="text-center">Page réservée aux administrateurs de ce site !</p>
    </div>

    <?php
}

?>
</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="../../assets/js/script.js"></script>
</html>