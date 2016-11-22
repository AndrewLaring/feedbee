<?php

namespace app\models;

use laring\core\Model;

class RegistrationModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        array_pop($data); //remove last $data element
        $st = $this->db->prepare("INSERT into user (ID, NAME, EMAIL, PASSWORD, TYPE) VALUES (NULL, ?, ?, MD5(?), 0)");
        $result = $st->execute(array_values($data)); // Inserting without keys
        if ($result === FALSE) {
            $msg = 'Error user insert! ' . $st->errorInfo()[2];
            throw new \PDOException  ($msg, $st->errorCode());
        }
        $uId = $this->db->lastInsertId();
        if ($result) {
            return $uId;
        } else {
            return FALSE;
        }
    }

    public function getUserByEmail($email)
    {
        $st = $this->db->prepare("SELECT * FROM user WHERE EMAIL = :email");
        $st->execute(array(
            ':email' => $email,
        ));
        $user = $st->fetch(\PDO::FETCH_ASSOC);
        if ($user) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
