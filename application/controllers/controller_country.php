<?php
namespace App\controllers;

use App\core\Controller;
use App\core\View;
use App\models\Model_Country;
use App\models\Model_User;
class Controller_Country extends Controller
{
    function __construct()
    {
        $this->model = new Model_Country();
        $this->modelUser = new Model_User();
        $this->view = new View();
    }

    // function action_select()
    // {
    //     session_start();
    //     if (!isset($_SESSION['email'])) {
    //         header('Location: /login');
    //     }

    //     $data = [];
    //     $data['country'] = $this->model->getData();

    //     $this->view->generate('dashboard_view.php', 'template_view.php');
    // }

    function action_save()
    {
        $userId = $this->modelUser->getUserByEmail($_SESSION['email'])['id'];
        $country = $_POST['country_name'];

        $checkFormSubmitted = (!empty($_POST['country_name']));

        if ($checkFormSubmitted) {
            $this->model->saveNewCountry($userId, $country);
            $this->view->generate('kuleba_view.php', 'template_view.php');
        }
    }
}