<?php

namespace App\controllers;

use App\core\Controller;
use App\core\View;
use App\models\Model_Country;
use App\models\Model_Weapon;

class Controller_Dashboard extends Controller
{
    public function __construct()
    {
        $this->countryModel = new Model_Country();
        $this->weaponModel = new Model_Weapon();
        $this->view = new View();
    }

    public function action_index()
    {
        if (!isset($_SESSION['email'])) {
            header('Location: /login');
        }

        $data = [];
        $data['countries'] = $this->countryModel->getData();
        $data['weapons'] = $this->weaponModel->getData();
        $data['email'] = $_SESSION['email'];

        $this->view->generate('dashboard_view.php', 'template_view.php', $data);
    }
}
