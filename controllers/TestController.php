<?php

namespace app\controllers;

use laring\core\Controller;

/**
 * Class TestController
 * @package app\controllers
 */
class TestController extends Controller
{

    /**
     * TestController constructor.
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
        $this->view->render('test/index');
    }

    /**
     *
     */
    public function test()
    {
        $image = $_FILES['picture']['tmp_name'];
        imagejpeg($image, '/var/www/html/bee/public/images/16-May-2016_320x240_2.jpg', 80);
    }

}
