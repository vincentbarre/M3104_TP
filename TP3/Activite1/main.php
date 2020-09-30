<?php

include_once ("Etudiant.class.php");

if (session_status () != PHP_SESSION_ACTIVE) {
    session_start ();
}

$etu = new Etudiant;

// Test 1 : cas devant échouer
$etu->getAuth ("admin", "123456");
if (isset($_SESSION["login"]))
    echo ("Test 1 KO : " . $_SESSION["login"] . " est connecté<br />\n ");
else
    echo ("Test 1 OK <br />\n ");
$etu->deconnexion ();

// Test 2 : cas devant réussir
$etu->getAuth ("admin", "totoro");

if (isset($_SESSION["login"]))
    echo ("Test 2 OK " . $_SESSION["login"] . " est connecté<br />\n ");
else
    echo ("Test 2 KO <br />\n ");
$etu->deconnexion ();