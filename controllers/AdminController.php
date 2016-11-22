<?php

namespace app\controllers;

use laring\core\Controller;
use app\models\AdminModel;

class AdminController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function edit_action()
    {
        $admin = new AdminModel();

        if ($_POST) {
            $feedback = [
                "ID" => parent::test_input_data($_POST['fId']),
                "MESSAGE" => parent::test_input_data($_POST['message']),
                "STATUS" => 3,
            ];
            var_dump($feedback);


            $admin->editFeedback($feedback);
        }
        return;
    }

    public function status_action()
    {
        $admin = new AdminModel();

        if ($_POST) {
            $fId = $_POST['fId'];
            $st = $_POST['st'];
            if ($st == 1 || $st == 3) {
                $admin->setStatus(0, $fId);
                echo NULL;
                return;
            } else {
                $admin->setStatus(1, $fId);
                echo TRUE;
                return;
            }
            echo "";
            return;
        }
    }

}
