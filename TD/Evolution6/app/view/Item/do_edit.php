<?php

    if ($this->data) {
        include("../app/view/Item/display.php");
    } else {
        // en cas d'erreur ou si rien n'est modifié
        include("../app/view/Error/error404.php");
    }