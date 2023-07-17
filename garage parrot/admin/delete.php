<?php
include('../bdd/cnx.php');
$home = 'dashboard.php';

$id = $_GET['id'];

if($id == true)
{
    $sql = "DELETE FROM `garage_admin` 
            WHERE `garage_admin`.`id` = $id";
    $req = $db->prepare($sql);

    $delete = $req->execute();

    if($delete)
    {
        ?>
            <div class="alert alert-success" role="alert">
                <h1 class="text-center">ALERTE</h1>
                <p class="text-center">L'administrateur avec l'identifiant <?php echo $id ?> a bien été supprimé !</p>
        <?php
    }
}
else
{
    echo 'Identifiant introuvable !';
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Administrateur - Supprimer administrateur</title>
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

<div class="text-center">
    <a class="text-white text-decoration-none" href="<?php echo $home ?>"><button class="btn btn-primary">Retour</a></button>
</div>

</body>