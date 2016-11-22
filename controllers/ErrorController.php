<?php

namespace app\controllers;

use laring\core\Controller;

class ErrorController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('error/index');
        $this->view->msg = 'Страницы не существует!';
        $this->view->render('error/index');
    }
}