<?php
session_start();
include('../bdd/cnx.php');
$email = $_SESSION['email'];

/* Ajout de l'administrateur à la BDD */

if(isset($_POST['add']))
{
    $emailDeux = $_POST['email'];
    $mdp = $_POST['mdp'];

    if(!empty($emailDeux) && !empty($mdp))
    {
        $sql = "INSERT INTO `garage_admin`(`email`, `mdp`) 
                VALUES (:email, :mdp)";

        $req = $db->prepare($sql);

        $req->bindValue(':email', $emailDeux);
        $req->bindValue(':mdp', $mdp);
        $envoi = $req->execute();

        if($envoi)
        {
            ?>
                <div class="alert alert-success" role="alert">
                    <h1 class="text-center">Succès</h1>
                    <p class="text-center">
                        Le nouvel administrateur avec l'email : <?php echo $emailDeux ?> a bien été ajouté sur notre BDD !
                    </p>
                </div>
            <?php
        }
        else
        {
            ?>
                <div class="alert alert-danger" role="alert">
                    <h1 class="text-center">ALERTE</h1>
                    <p class="text-center">
                        Le nouvel administrateur avec l'email : <?php echo $emailDeux ?> n'a pas été ajouté sur notre BDD !
                    </p>
                </div>
            <?php
        }
    }
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
</head>
<body>
<header class="header-cnx-admin">
    <h1>Espace admin - Ajouter un administrateur</h1>
</header>

<section>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form method="post">
          <div class="form-group">
              <label for="email">Email :</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Entrez l'adresse email">
            </div>
            <div class="form-group">
              <label for="mdp">Mot de passe :</label>
              <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Entrez le mot de passe">
            </div>
            <button type="submit" class="btn btn-block" name="add">Ajouter</button>
          </form>
        </div>
      </div>
    </div>
  </section>

<div class="text-center">
  <a href="dashboard.php"><button class="btn btn-primary">Retour</button></a>
</div>
</body>
</html>