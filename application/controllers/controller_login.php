<?php

namespace App\controllers;

use App\core\Controller;
use App\core\View;

class Controller_Login extends Controller
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function action_index()
    {
        $this->view->generate('login_view.php', 'template_view.php');
    }
}
