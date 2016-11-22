<?php

namespace laring\core;

class View
{

    public function __construct()
    {
        $this->msg = array();
    }

    public function render($name, $noInclude = false, $layout = 'index')
    {
        if ($noInclude == true) {
            require BASEPATH . 'views/' . $name . '.php';
        } else {
            require BASEPATH . 'views/_layouts/_' . $layout . '.php';
            require BASEPATH . 'views/' . $name . '.php';
            require BASEPATH . 'views/footer.php';
        }
    }

}
