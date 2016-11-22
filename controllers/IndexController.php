<?php

namespace app\controllers;

use laring\core\Controller;

/**
 * Class IndexController
 * @package app\controllers
 */
class IndexController extends Controller
{

    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     */
    public function index()
    {
        $this->view->render('index/index');
    }

}
