<?php

namespace App\controllers;

use App\core\Controller;
use App\models\Model_User;
use App\core\View;

class Controller_User extends Controller
{
    public function __construct()
    {
        $this->model = new Model_User();
        $this->view = new View();
    }

    public function action_index()
    {
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: /login');
        }

        $this->view->generate('login_view.php', 'template_view.php');
    }

    public function action_save()
    {
        $errors = [];

        if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])) {
            if ($_POST["confirm_password"] == $_POST["password"]) {
                $this->model->saveUser($_POST['email'], $_POST['password']);
                header('Location: /login');
            } else {
                $errors[] = "Пароли не совпадают";
            }
        } else {
            $errors[] = "Заполните все поля";
        }

        $this->view->generate('register_view.php', 'template_view.php', ['error_messages' => $errors]);
    }

    public function action_check()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $user = new Model_User();
            $result = $user->checkUser($_POST['email'], $_POST['password']);
            if ($result) {
                $_SESSION['email'] = $_POST['email'];
                header("Location: /dashboard");
            }
            $this->view->generate('login_view.php', 'template_view.php');
        }
    }

    public function action_logout()
    {
        session_start();
        unset($_SESSION['email']);
        header('Location: /login');
    }
}
