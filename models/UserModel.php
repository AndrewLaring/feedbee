<?php

namespace app\models;

use laring\core\Model;

class UserModel extends Model
{

    const TYPE_ADMIN = 1;
    const TYPE_USER = 0;


    public function getUser($uId)
    {
        $st = $this->db->prepare("SELECT * FROM user WHERE ID = ? LIMIT 1");
        $st->execute(array($uId));
        if ($st->rowCount() == 1) {
//            return $st->fetchAll(PDO::FETCH_ASSOC);
            $user = $st->fetch(\PDO::FETCH_ASSOC);
            return $user;
        }
    }
}