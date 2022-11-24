<?php

class monCompteController
{

    public function __construct()
    {
        session_start();
        error_reporting(E_ALL);
        require_once "vue/monCompte.php";

        echo 'vdsvsdv';
        // $c = new monCompte();
        // $c->affiche();

        if (Controller::auth()) {
            $c = new monCompte();
            $c->affiche();
        } else {

            header('Location: index.php?error=login');
        }
    }
}
