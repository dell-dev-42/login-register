<?php

namespace App\controllers;

use App\core\Controller;
use App\core\View;

class Controller_Kuleba extends Controller
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function action_index()
    {
        if (!isset($_SESSION['email'])) {
            header('Location: /login');
        }

        $this->view->generate('kuleba_view.php', 'template_view.php');
    }
}
