<?php

class Controller_Register extends Controller
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function action_index()
    {
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: application/views/login');
        }

        $this->view->generate('register_view.php', 'template_view.php');
    }

}
