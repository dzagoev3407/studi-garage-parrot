<?php

$sqlDisplayAdmin = "SELECT `id`, `email`, `mdp` 
                    FROM `garage_admin` 
                    ORDER BY `id` ASC";
$reqDisplayAdmin = $db->query($sqlDisplayAdmin);
$displayAdmin = $reqDisplayAdmin->fetchAll();