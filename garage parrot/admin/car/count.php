<?php

$sqlCountCar = "SELECT COUNT(`id`) AS total FROM `garage_vehicule`";
$reqCountCar = $db->query($sqlCountCar);
$resultCountCar = $reqCountCar->fetch(PDO::FETCH_ASSOC);
$totalCountCar = $resultCountCar['total'];