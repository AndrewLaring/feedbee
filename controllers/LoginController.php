<?php

namespace app\controllers;

use laring\core\Controller;
use laring\core\Session;
use app\models\LoginModel;

class LoginController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        Session::init();
        if (Session::get('loggedIn') != TRUE) {
            $this->view->render('login/index');
        } else {
            header('Location: ../user');
        }
    }

    public function run()
    {
        $loginModel = new LoginModel();
        $user = $loginModel->run(parent::test_input_data($_POST['email']), parent::test_input_data($_POST['password']));
        if ($user) {
            Session::init();
            Session::set('loggedIn', TRUE);
            Session::set('user_id', $user['ID']);
            Session::set('user_name', $user['NAME']);
            Session::set('user_type', $user['TYPE']);
            header('Location: ../user');
        } else {
//            header('Location: ../login');
            $this->view->msg[] = "Неверный логин или пароль";
            $this->view->render('login/index');
        }
    }

}
