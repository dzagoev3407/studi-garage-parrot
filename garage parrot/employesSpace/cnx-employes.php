<?php
session_start();
include('../bdd/cnx.php');

function errorCnx()
{
  ?>
    <div class="alert alert-danger" role="alert">
      <h1 class="text-center">ALERTE</h1>
      <p class="text-center">Email ou mot de passe incorrect ! Veuillez réessayez !</p>
    </div>
  <?php
}

if(isset($_POST['cnx']))
{
   $email = $_POST['email'];
   $mdp = $_POST['mdp'];

   if(!empty($email) && !empty($mdp))
   {
        $sql = "SELECT * FROM `garage_employes` WHERE email = ? AND mdp = ? ";
        $cnxEmployes = $db->prepare($sql);
        $cnxEmployes->execute(array($email, $mdp));

        if($cnxEmployes->rowCount() > 0)
        {
            $_SESSION['email'] = $email;
            
            $template = 'template.php';

            header("Location: $template");
        }
        else
        {
            errorCnx();
        }
   }
   else
   {
        ?>

        <div class="alert alert-danger" role="alert">
            <p class="text-center">Employé non reconnu !</p>
        </div>

        <?php
   }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Formulaire de connexion - Espace employés</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/bootstrap/bootstrap.min.css">
</head>
<body>
  <header class="header-cnx-admin">
    <h1>Formulaire de connexion - Espace employés</h1>
  </header>
  
  <section class="form-admin-cnx">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="form-container">
          <form action="" method="POST">
            <div class="form-group">
              <label for="username">Adresse email :</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre adresse email">
            </div>
            <div class="form-group">
              <label for="password">Mot de passe:</label>
              <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Entrez votre mot de passe">
            </div>
            <button type="submit" class="btn-cnx btn-block" name="cnx">Se connecter</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          &copy; <?php echo date('Y') ?> Garage de Vincent Parrot. Tous droits réservés.
        </div>
      </div>
    </div>
  </footer>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
