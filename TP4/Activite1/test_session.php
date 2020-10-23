<?php

session_start ();

if (isset($_SESSION['login'])) {
    echo "Test OK : session initialisée pour " . $_SESSION['login'];
} else {
    echo "Test KO : pas d'authentification via la session !";
}
