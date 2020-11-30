<?php

namespace Controller;

use App\Session;
use App\Router;

class HomeController
{
    /**
     * Afficher la page d'accueil
     */
    public function index()
    {

        return [
            "view" => "forum/home.php",
            "data" => null,
            "titrePage" => "FORUM | Accueil"
        ];
    }
}
