<?php

include "application/models/model_politic.php";

class Controller_Comment extends Controller
{
    public function __construct()
    {
        $this->model = new Model_Comment();
        $this->modelPolitic = new Model_Politic();
        $this->view = new View();
    }

    public function action_index()
    {
        session_start();
        if (!isset($_SESSION['email'])) {
            header('Location: /login');
        }
        $data = [];
        $data['politics'] = $this->modelPolitic->getData();
        $data['comments'] = $this->model->getParentComments();

        $data['commentModel'] = $this->model;

        $this->view->generate('comment_view.php', 'template_view.php', $data);
    }

    public function action_save()
    {
        // var_dump($_POST);die();
        // $parent_id = $_POST['parent_id'];

        $parent_id = (!empty($_POST['parent_id'])) ? $_POST['parent_id'] : 0;

        // if (!empty($_POST['parent_id'])) {
        //     $parent_id = $_POST['parent_id'];
        // } else {
        //     $parent_id = 0;
        // }

        $politic_id = $_POST['politic'];
        $comment = $_POST['comment'];

        // $checkFormSubmitted = (!empty($_POST['comment']));

        if (!empty($_POST['comment'])) {
            $this->model->saveNewComment($politic_id, $comment, $parent_id);
            // $this->view->generate('comment_view.php', 'template_view.php');
            header('Location: /comment');
        }
    }
}
