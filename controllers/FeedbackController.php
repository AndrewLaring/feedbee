<?php


namespace app\controllers;

use laring\core\Controller;
use laring\core\Session;
use app\models\FeedbackModel;

/**
 * Class FeedbackController
 */
class FeedbackController extends Controller
{
    /**
     * FeedbackController constructor.
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
        isset($_POST['sort_by']) ? $sort_by = parent::test_input_data($_POST['sort_by']) : $sort_by = 'ID';
        Session::init();
        $model = new FeedbackModel();
        if (Session::get('user_type') == 1) {
            $feedbacks = $model->getAllFeedbacks($sort_by);
        } else {
            $feedbacks = $model->getFeedbacks($sort_by);
        }

        Session::get('msg') ? $this->view->msg[] = Session::get('msg') : null;
        Session::set('msg', null);
        $this->view->user_type = Session::get('user_type');
        $this->view->feedbacks = $feedbacks;
        $this->view->render('feedback/index');
    }

    /**
     *
     */
    public function create_action()
    {
        $model = new FeedbackModel();

        $feedback = [
            "NAME" => parent::test_input_data($_POST['name']),
            "EMAIL" => parent::test_input_data($_POST['email']),
            "MESSAGE" => parent::test_input_data($_POST['message']),
            "IMAGE" => '',
        ];

        if ($_FILES['picture']['name'] != '') {
            Session::init();
            Session::set('msg', $this->fileUpload());
            $feedback["IMAGE"] = date("d-M-Y") . "_" . parent::test_input_data($_FILES['picture']['name']);
        }

        if (Session::get('msg') == FALSE) {
            $fId = $model->createFeedback($feedback);
        }

        if (isset($fId)) {
            header_remove();
            header('Location: /feedback', TRUE, 302);
        } else {
            header_remove();
            header('Location: /feedback', TRUE, 302);
        }
    }

    /**
     * @return bool|string
     */
    public function fileUpload()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' AND isset($_FILES['picture'])) {

            $path = BASEPATH . 'public/images/' . date("d-M-Y") . "_" . $_FILES['picture']['name'];
            $max_file_size = 1024 * 5000; // 500kb
            $types = array('image/gif', 'image/png', 'image/jpeg');
            $extentions = array('gif', 'png', 'jpeg', 'jpg');
            $w = 320;
            $h = 240;

            $ext = (new \SplFileInfo($_FILES['picture']['name']))->getExtension();

            if (!in_array($_FILES['picture']['type'], $types) || !in_array($ext, $extentions)) {
                return 'Запрещённый тип файла.';
            }

            if ($_FILES['picture']['size'] > $max_file_size) {
                return 'Слишком большой размер файла.';
            }

            $imageSize = getimagesize($_FILES['picture']['tmp_name']);

            if ($w > $imageSize[0] && $h > $imageSize[1]) {
                move_uploaded_file($_FILES['picture']['tmp_name'], $path);
                return FALSE;
            } else {
                $koef = $imageSize[0] / $w;
                $height = ceil($imageSize[1] / $koef);

                $imgString = file_get_contents($_FILES['picture']['tmp_name']);
                $inImage = imagecreatefromstring($imgString);
                $outImage = imagecreatetruecolor($w, $height);
                imagecopyresampled($outImage, $inImage, 0, 0, 0, 0, $w, $height, $imageSize[0], $imageSize[1]);

                switch ($_FILES['picture']['type']) {
                    case 'image/jpeg':
                        imagejpeg($outImage, $path, 100);
                        break;
                    case 'image/png':
                        imagepng($outImage, $path, 0);
                        break;
                    case 'image/gif':
                        imagegif($outImage, $path);
                        break;
                    default:
                        exit;
                        break;
                }
                return FALSE;
            }
        }
        return 'Сообщение успешно отправлено';
    }

}
