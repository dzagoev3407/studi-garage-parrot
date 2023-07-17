<?php

$sqlCountEmployes = "SELECT COUNT(`id`) AS total FROM `garage_employes`";
$reqCountEmployes = $db->query($sqlCountEmployes);
$resultCountEmployes = $reqCountEmployes->fetch(PDO::FETCH_ASSOC);
$totalCountEmployes = $resultCountEmployes['total'];