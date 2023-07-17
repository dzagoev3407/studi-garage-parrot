<?php
session_start();
$email = $_SESSION['email'];
$cnx_admin = 'cnx-admin.php';
$deconnexion = session_destroy();

if($deconnexion)
{
    header("Location: $cnx_admin");
}
else
{
    echo "Erreur lors de le déconnexion";
}