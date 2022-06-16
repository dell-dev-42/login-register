<?php

namespace App\controllers;

use App\core\Controller;
use App\core\View;
use App\models\Model_Weapon;
use App\models\Model_User;

class Controller_Weapon extends Controller
{
    function __construct()
    {
        $this->model = new Model_Weapon();
        $this->modelUser = new Model_User();
        $this->view = new View();
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
