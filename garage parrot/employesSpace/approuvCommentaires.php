<?php
session_start();
include('../bdd/cnx.php');

$id = $_GET['id'];

if($id)
{
   $sql = "UPDATE `garage_commentaires` 
           SET `verif` = 'oui' 
           WHERE `garage_commentaires`.`id` = $id";
           
   $req = $db->prepare($sql);
   $approuv = $req->execute();

   if($approuv)
   {
    ?>

    <div class="alert alert-success" role="alert">
        Commentaires avec l'id <?php echo $id ?> a bien été approuvé !
    </div>

    <?php
   }
}
else
{
  ?>
  
    <div class="alert alert-danger" role="alert">
        id introuvable !
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
    <a href="template.php"><button class="btn btn-primary">Retour</button></a>
</body>
</html>