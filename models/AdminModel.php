<?php

namespace app\models;

use laring\core\Model;

class AdminModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function setStatus($status, $fId)
    {
        $st = $this->db->prepare("UPDATE fb SET STATUS=:status WHERE ID=:fId");
        $st->execute(array(
            ':status' => $status,
            ':fId' => $fId,
        ));
        return $fId;
    }

    public function editFeedback($feedback)
    {
        $st = $this->db->prepare("UPDATE fb SET STATUS=:status, MESSAGE=:message WHERE ID=:fId");
        try {
            $result = $st->execute(array(
                ':status' => $feedback['STATUS'],
                ':message' => $feedback['MESSAGE'],
                ':fId' => $feedback['ID']
            ));
            if ($result) {
                return;
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

}
