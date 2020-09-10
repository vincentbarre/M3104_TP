<?php

include_once ("Etudiant.class.php");

$etu = new Etudiant;

// ajout valide, devrait renvoyer 'true'
if ($etu->createUser ("sam", "valide", "sam@rrange.fr", "0123456789")) {
    echo ("Test OK <br/>\n");
} else {
    echo ("Test KO <br/>\n");
}

// login existe déjà, devrait renvoyer 'false'
if ($etu->createUser ("admin", "totoro", "admin@totoro.tv", "0123456789")) {
    echo ("Test KO <br />\n");
} else {
    echo ("Test OK <br />\n");
}

