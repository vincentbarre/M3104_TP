<?php

include_once ("Etudiant.class.php");

$etu = new Etudiant;
$etu->getAuth ('sam', 'valide');

// modification valide, devrait renvoyer 'true'
if ($etu->updateUserV2 (null, null, "2468")) {
    echo ("Test OK <br />\n");
} else {
    echo ("Test KO <br />\n");
}

// modification valide, devrait renvoyer 'true'
if ($etu->updateUserV2 ("VaBien", null, null)) {
    echo ("Test OK <br />\n");
} else {
    echo ("Test KO <br />\n");
}

// modification valide, devrait renvoyer 'true'
if ($etu->updateUserV2 (null, "s@md.it", null)) {
    echo ("Test OK <br />\n");
} else {
    echo ("Test KO <br />\n");
}

// modification valide, devrait renvoyer 'true'
if ($etu->updateUserV2 ("speciale", "sam@suff.it", null)) {
    echo ("Test OK <br />\n");
} else {
    echo ("Test KO <br />\n");
}

