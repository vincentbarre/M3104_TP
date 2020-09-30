<?php

include ("Etudiant.class.php");

if (session_status () != PHP_SESSION_ACTIVE) {
    session_start ();
}

$etu = new Etudiant;

// Cas devant réussir (si la session existe)
if ($etu->getAuth ()) {
    echo ("Test 1 – partie 2 : OK <br />\n");
} else {
    echo ("Test 1 – partie 2 : KO <br />\n");
}
