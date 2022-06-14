<?php

include "application/models/model_user.php";

class Controller_Weapon extends Controller
{
    function __construct()
    {
        $this->model = new Model_Weapon();
        $this->modelUser = new Model_User();
        $this->view = new View();
    }

    function action_select()
    {
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: application/views/login');
        }

        $data = [];
        $data['weapon'] = $this->model->getData();

        $this->view->generate('dashboard_view.php', 'template_view.php', $data);
    }

    function action_save()
    {
        $userId = $this->modelUser->getUserByEmail($_SESSION['email'])['id'];
        $weapon = $_POST['weapon_name'];

        $checkFormSubmitted = (!empty($_POST['weapon_name']));

        if ($checkFormSubmitted) {
            $this->model->saveNewWeapon($userId, $weapon);
            $this->view->generate('kuleba_view.php', 'template_view.php');
        }
    }
}