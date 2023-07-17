<?php

$sqlDisplayEmployes = "SELECT `id`, `nom`, `prenom`, `email`, `mdp` 
                       FROM `garage_employes` 
                       ORDER BY `id` ASC";
$reqDisplayEmployes = $db->query($sqlDisplayEmployes);
$displayEmploye = $reqDisplayEmployes->fetchAll();