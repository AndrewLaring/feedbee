<?php

namespace app\controllers;

use laring\core\Controller;
use app\models\HelpModel;

/**
 * Class HelpController
 * @package app\controllers
 */
class HelpController extends Controller
{
    /**
     * HelpController constructor.
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
        $this->view->render('help/index');
    }
}