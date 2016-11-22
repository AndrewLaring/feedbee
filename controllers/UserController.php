<?php

namespace app\controllers;

use laring\core\Controller;
use laring\core\Session;
use app\models\UserModel;

/**
 * Class UserController
 * @package app\controllers
 */
class UserController extends Controller
{

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        Session::init();
        $logged = Session::get('user_id');
        if ($logged == false) {
            Session::destroy();
            header('Location: ../index');
            exit();
        }
    }

    /**
     *
     */
    public function index()
    {
        $model = new UserModel();
        $uId = Session::get('user_id');
        $this->view->user = $model->getUser($uId);
        if ($this->view->user['TYPE'] == 1) {
            $this->view->user['TYPE'] = 'admin';
        }
        $this->view->render('user/index');
    }

    /**
     *
     */
    public function logout()
    {
        Session::destroy();
        header('Location: ../index');
        exit();
    }

}
