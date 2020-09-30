<?php

include ("Etudiant.class.php");

if (session_status () != PHP_SESSION_ACTIVE) {
    session_start ();
}

$etu = new Etudiant;

// Cas devant réussir
if ($etu->getAuth ("admin", "totoro")) {
    echo ("Test 1 – partie 1 : OK <br />\n");
} else {
    echo ("Test 1 – partie 1 : KO <br />\n");
}
