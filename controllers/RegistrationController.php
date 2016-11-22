<?php

namespace app\controllers;

use laring\core\Controller;
use laring\core\Session;
use app\models\RegistrationModel;

class RegistrationController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('registration/index');
    }

    public function registrate_action()
    {
        $regModel = new RegistrationModel();
        if (!$_POST['name'] && !$_POST['mail'] && !$_POST['password'] && !$_POST['conf_pass']) {
            $this->view->msg[] = "Заполните обязательные поля формы";
        }
        if ($_POST['password'] != $_POST['conf_pass']) {
            $this->view->msg[] = "Пароли должны совпадать";
        }
        if ($regModel->getUserByEmail($_POST['email']) === TRUE) {
            $this->view->msg[] = "Данный EMAIL уже используется системой";
        }


        if (count($this->view->msg) > 0) {
            return $this->view->render('registration/index');
        } else {
            $arrPost = array(
                "NAME" => parent::test_input_data($_POST['name']),
                "EMAIL" => parent::test_input_data($_POST['email']),
                "PASSWORD" => parent::test_input_data($_POST['password']),
                "CONF_PASS" => parent::test_input_data($_POST['conf_pass'])
            );

            $uId = $regModel->insert($arrPost);
        }
//
        if ($uId) {
            Session::init();
            Session::set('user_id', $uId);
            Session::set('user_name', $arrPost['NAME']);
            Session::set('user_type', 0);
            header('Location: ../user');
        } else {
            $this->view->render('registration/index');
        }
    }

}
