<?php

include_once ("authentification.php");

if (authentification ("admin", "totoro") == 200) {
    echo "Test 1 : OK <br />";
} else {
    echo "Test 1 : KO <br />";
}

if (authentification ("admin", "n1portekoi") == 403) {
    echo "Test 2 : OK <br />";
} else {
    echo "Test 2 : KO <br />";
}

