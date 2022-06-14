<?php

include "application/models/model_country.php";
include "application/models/model_weapon.php";

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
        session_start();

        if (!isset($_SESSION['email'])) {
            header('Location: application/views/login');
        }

        $data = [];
        $data['countries'] = $this->countryModel->getData();
        $data['weapons'] = $this->weaponModel->getData();
        $data['email'] = $_SESSION['email'];

        $this->view->generate('dashboard_view.php', 'template_view.php', $data);
    }
}
