<?php

namespace laring\core;

class Controller
{

    public function __construct()
    {
        $this->view = new View();
    }

    public function loadModel($name)
    {
        $path = 'models/' . $name . '_model.php';
        if (file_exists($path)) {
            require 'models/' . $name . '_model.php';
            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }
    }

    public function test_input_data($data)
    {
        // допилить валидацию
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
//        $data = mysql_escape_string($data);
        return $data;
    }

}
