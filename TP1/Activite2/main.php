<?php

include_once ("Etudiant.class.php");

$etu = new Etudiant;
if ($etu->getAuth ("admin", "123456")) echo ("Test KO <br />\n ");
else
    echo ("Test OK <br />\n ");
if ($etu->getAuth ("admin", "totoro")) echo ("Test OK <br />\n ");
else
    echo ("Test KO <br />\n ");