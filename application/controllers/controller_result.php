<?php

include "application/models/model_user.php";
include "application/models/model_country.php";
include "application/models/model_weapon.php";

class Controller_Result extends Controller
{
    public function __construct()
    {
        $this->modelResult = new Model_Result();
        $this->modelUser = new Model_User();
        $this->countryModel = new Model_Country();
        $this->weaponModel = new Model_Weapon();
        $this->view = new View();
    }

    public function action_save()
    {
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: application/views/login');
        }

        $checkFormSubmitted = (!empty($_POST['country_id']) &&
            !empty($_POST['weapon_id']) &&
            !empty($_POST['amount']) &&
            !empty($_POST['user_email'])
        );

        if ($checkFormSubmitted) {
            $user = $this->modelUser->getUserByEmail($_POST['user_email']);

            $this->modelResult->saveAmount(
                $user['id'],
                $_POST['country_id'],
                $_POST['weapon_id'],
                $_POST['amount']
            );

            $this->view->generate('dashboard_view.php', 'template_view.php');
        }
    }

    public function action_index()
    {
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: application/views/login');
        }

        $data = [];
        $userId = $this->modelUser->getUserByEmail($_SESSION['email'])['id'];
        $data['countries'] = $this->countryModel->getData();
        $data['weapons'] = $this->weaponModel->getData();
        $data['results'] = $this->modelResult->getResultToTheTable(
            $userId
        );

        // var_dump($data['results']);

        $summ = $this->modelResult->getTotalAmount(
            $userId
        );

        $data['results'] = array_map(function ($row) use ($summ) {
            $data = [];
            if ($summ == '0') {
                throw new \Exception('error - на ноль делить нельзя!!');
            }
            $data[$row['country_name']][$row['weapon_name']] = $row['amount'] / $summ * 100;
            return $data;
        }, $data['results']);

        $this->view->generate('table_view.php', 'template_view.php', $data);
    }
}
