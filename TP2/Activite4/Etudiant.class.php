<?php

include_once ("Utilisateur.class.php");

/**
 * @author Vincent Barré
 * @version 1.0
 */
class Etudiant extends Utilisateur
{

    protected $groupe;
    protected $cours = [];
    protected $resultats = [];
    protected $productions = [];

}