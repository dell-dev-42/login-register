<?php

namespace App\controllers;

use App\core\Controller;

class Controller_Main extends Controller
{
    public function action_index()
    {
        $this->view->generate('login_view.php', 'template_view.php');
    }

    public function action_save()
    {
        $this->view->generate('register_view.php', 'template_view.php');
    }

    public function action_check()
    {
        $this->view->generate('login_view.php', 'template_view.php');
    }

    public function action_select()
    {
        $this->view->generate('dashboard_view.php', 'template_view.php');
    }
}
