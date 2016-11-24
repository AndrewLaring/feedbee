<?php

namespace app\models;

use laring\core\Model;

/**
 * Class FeedbackModel
 * @package app\models
 */
class FeedbackModel extends Model
{

    /**
     * @var
     */
    public $feedback;

    /**
     * FeedbackModel constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $sort_by
     * @return array
     */
    public function getFeedbacks($sort_by)
    {
        $st = $this->db->prepare("SELECT * FROM fb WHERE STATUS in(1, 3) ORDER BY $sort_by DESC");
        $st->execute();
        $feedbacks = $st->fetchAll(\PDO::FETCH_ASSOC);
        return $feedbacks;
    }

    /**
     * @param $sKey
     * @return array
     */
    public function getAllFeedbacks($sKey)
    {
        $st = $this->db->prepare("SELECT * FROM fb ORDER BY $sKey DESC");
        $st->execute();
        $feedbacks = $st->fetchAll(\PDO::FETCH_ASSOC);
        return $feedbacks;
    }

    /**
     * @param $params
     * @return string
     */
    public function createFeedback($params)
    {
        $st = $this->db->prepare("INSERT into fb (ID, NAME, EMAIL, MESSAGE, IMAGE, STATUS) VALUES (NULL, ?, ?, ?, ?, 0)");
        try {
            $result = $st->execute(array_values($params)); // Inserting without keys
            $fId = $this->db->lastInsertId();
            if ($result) {
                return $fId;
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param $data
     */
    public function validate($data)
    {

    }

}
