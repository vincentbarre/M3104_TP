<?php

include_once ("Etudiant.class.php");

$etu = new Etudiant;
$etu->getAuth ('sam', 'valide');

// modification valide, devrait renvoyer 'true'
if ($etu->updateUser ("valide", "sam@rrange.fr", "9876543210")) {
    echo ("Test OK <br />\n");
} else {
    echo ("Test KO <br />\n");
}

