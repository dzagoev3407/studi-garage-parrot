<?php

/* Message de réussite */

function cnxSuccess()
{
    ?>

    <div class="alert alert-sucess" role="alert">
        <h1 class="text-center">Connexion réussie !</h1>
    </div>

    <?php
}

/* Message d'erreur */

function cnxNoSuccess()
{
    ?>

    <div class="alert alert-danger" role="alert">
        <h1 class="text-center">Connexion échouée !</h1>
    </div>

    <?php
}

$username = "dbu1144754";
$mdp = "3aA(9!t3caA)7K";

$db = new PDO("mysql:host=db5013232885.hosting-data.io;dbname=dbs11100810;", $username, $mdp);

/* Test en cas de bug 

if($db)
{
    cnxSuccess(); // On affiche le message de succès
}
else
{
    cnxNoSuccess(); // On affiche le message d'erreur de connexion à la BDD
}

*/

?>