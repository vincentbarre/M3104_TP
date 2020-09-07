<?php

// import de la définition de la fonction authentification()
include_once ("authentification.php");

if (authentification ($_POST["login"], $_POST["password"])) {
    echo ("ok");
}
