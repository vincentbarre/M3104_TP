<?php

include_once ("Etudiant.class.php");

$etu = new Etudiant;

if ($etu->getAuth ("admin", "123456")) { // cas échec
    echo ("test KO <br />\n ");
} else {
    echo ("test OK <br />\n ");
}

if ($etu->getAuth ("etu01", "secret")) { // cas succès
    echo ("test OK <br />\n ");
    $etu->getInfos ();
} else {
    echo ("test KO <br />\n ");
}


