<?php

$sqlDisplayHoraires = "SELECT `jour`, `matin`, `aprem` FROM `garage_horaires` 
                       ORDER BY `id` ASC";

$reqDisplayHoraires = $db->query($sqlDisplayHoraires);

$displayHoraires = $reqDisplayHoraires->fetchAll();