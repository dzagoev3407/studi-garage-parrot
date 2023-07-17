<?php

$sqlCountAdmin = "SELECT COUNT(`id`) AS total FROM `garage_admin`";
$reqCountAdmin = $db->query($sqlCountAdmin);
$resultCountAdmin = $reqCountAdmin->fetch(PDO::FETCH_ASSOC);
$totalCountAdmin = $resultCountAdmin['total'];