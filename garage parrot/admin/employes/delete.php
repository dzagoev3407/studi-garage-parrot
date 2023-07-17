<?php
session_start();
include('../../bdd/cnx.php');
$home = '../dashboard.php';

$id = $_GET['id'];

if($id)
{
    $sql = "DELETE FROM `garage_employes` 
            WHERE `garage_employes`.`id` = $id";

    $req = $db->prepare($sql);

    $delete = $req->execute();

    if($delete)
    {
        ?>
        <div class="alert alert-success" role="alert">
            <h1 class="text-center text-white">ALERTE</h1>
            <p class="text-center text-white">L'employé avec l'identifiant : <?php echo $id ?> a bien été supprimé !</p>
        </div>
    <?php
    }
    else
    {
        echo 'Employé non supprimé ! Réessayez !';
    }
}
else
{
    echo 'Employés introuvable !';
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Administrateur - Garage</title>
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
<div class="text-center">
    <a class="text-decoration-none text-white" href="<?php echo $home ?>"><button class="btn btn-primary text-white">Retour</button>
</div>
</body>