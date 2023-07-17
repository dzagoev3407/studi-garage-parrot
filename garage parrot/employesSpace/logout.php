<?php
session_start();
$_SESSION['email'] = $email;
$logout = session_destroy();
$cnx_employes = 'cnx-employes.php';

if($logout)
{
    header("Location: $cnx_employes");
}
else
{
    echo "Déconnexion non effectuée !";
}