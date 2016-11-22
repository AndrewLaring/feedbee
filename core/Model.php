<?php

namespace laring\core;

class Model
{
    public function __construct()
    {
        $this->db = new Database();
    }
}