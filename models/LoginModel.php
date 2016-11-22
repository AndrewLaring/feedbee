<?php

namespace app\models;

use laring\core\Model;

class LoginModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function run($email, $password)
    {
        $sth = $this->db->prepare("SELECT * FROM user WHERE EMAIL = :email AND PASSWORD = MD5(:password)");
        $sth->execute(array(
            ':email' => $email,
            ':password' => $password
        ));
        $user = $sth->fetch(\PDO::FETCH_ASSOC);
        return $user;
    }

}
