<?php

namespace App\controllers;

use App\core\Controller;
use App\core\View;

class Controller_Register extends Controller
{
    public function __construct()
    {
        $this->view = new View();
    }

    public function action_index()
    {
        $error_message = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            if ($password != $confirm_password) {
                $error_message[] = 'Passwords do not match';
            }
            if (empty($email)) {
                $error_message[] = 'Email is required';
            }
            if (empty($password)) {
                $error_message[] = 'Password is required';
            }
            if (empty($confirm_password)) {
                $error_message[] = 'Confirm password is required';
            }
            if (empty($error_message)) {
                $user = $this->model->get_user_by_email($email);
                if ($user) {
                    $error_message[] = 'User with this email already exists';
                } else {
                    $this->model->save_user($email, $password);
                    header('Location: /login');
                }
            }
        }
        $this->view->generate('register_view.php', 'template_view.php');
    }
}
