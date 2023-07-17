<?php
session_start();
include('../../bdd/cnx.php');
$email = $_SESSION['email'];

/* Message de validation */

function validate()
{
    ?>
        <div class="alert alert-success" role="alert">
            <h1 class="text-center">Succès</h1>
            <p class="text-center">Employés ajouté à la BDD !</p>
        </div>
    <?php
}

/* Message d'erreur lors de l'envoi */

function noValidate()
{
    ?>
        <div class="alert alert-danger" role="alert">
            <h1 class="text-center">ALERTE</h1>
            <p class="text-center">Employés non ajouté !</p>
        </div>
    <?php
}

if(isset($_POST['add']))
{
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $emailDeux = $_POST['email'];
    $mdp = $_POST['mdp'];

    if(!empty($nom) && !empty($prenom) && !empty($emailDeux) && !empty($mdp))
    {
        $sql = "INSERT INTO `garage_employes`(`nom`, `prenom`, `email`, `mdp`) 
                VALUES (:nom, :prenom, :email , :mdp)";

        $req = $db->prepare($sql);

        $req->bindvalue(':nom', $nom);
        $req->bindvalue(':prenom', $prenom);
        $req->bindvalue(':email', $emailDeux);
        $req->bindvalue(':mdp', $mdp);

        $envoi = $req->execute();

        if($envoi)
        {
            validate();
        }
        else
        {
            noValidate();
        }
    }
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Administrateur - Ajouter un administrateur</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../assets/css/styles.css">
  <link rel="stylesheet" href="../../assets/css/bootstrap/bootstrap.min.css">
</head>
<body>
  <header class="header-cnx-admin">
    <h1>Administrateur - Ajouter un compte employé</h1>
  </header>
  
  <section class="form-admin-cnx">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="form-container">
          <form action="" method="POST">
            <div class="form-group">
              <label for="nom">Nom :</label>
              <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrez votre nom">
            </div>
            <div class="form-group">
              <label for="prenom">Prénom :</label>
              <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrez votre prénom">
            </div>
            <div class="form-group">
              <label for="email">Adresse email :</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre email">
            </div>
            <div class="form-group">
              <label for="mdp">Mot de passe :</label>
              <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Entrez votre mot de passe">
            </div>
            <button type="submit" class="btn-cnx btn-block" name="add">Ajouter</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="text-center">
  <a href="../dashboard.php"><button class="btn btn-primary">Retour</button></a>
</div>

<footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          &copy; <?php echo date('Y') ?> Garage de Vincent Parrot. Tous droits réservés.
        </div>
      </div>
    </div>
  </footer>
  
</body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>