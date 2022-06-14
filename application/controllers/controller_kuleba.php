<?php
class Controller_Kuleba extends Controller
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

        $this->view->generate('kuleba_view.php', 'template_view.php');
    }

}
