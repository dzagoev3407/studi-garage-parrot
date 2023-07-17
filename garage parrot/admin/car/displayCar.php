<?php
session_start();
include('../../bdd/cnx.php');
$email = $_SESSION['email'];

$sql = "SELECT * FROM `garage_vehicule` ORDER BY `id` DESC";

$req = $db->query($sql);

$cars = $req->fetchAll();

$sqlDeux = "SELECT * FROM `garage_vehicule` ORDER BY `id` DESC LIMIT 5";

$reqDeux = $db->query($sqlDeux);

$carsCinqDernier = $reqDeux->fetchAll();

?>