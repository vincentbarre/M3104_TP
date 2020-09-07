<?php

include_once ("authentification.php");

// séquence de tests unitaires pour valider l'implémentation de la fonction
if (authentification ("admin", "totoro")) { // test ok si succès
    echo ("test OK <br />\n ");
} else {
    echo ("test KO <br />\n ");
}
if (authentification ("admin", "123456")) { // attention : test ok si échec
    echo ("test KO <br />\n ");
} else {
    echo ("test OK <br />\n ");
}
