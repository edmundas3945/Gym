<?php

namespace app\controller;

use app\core\Controller;
use app\core\Request;
use app\model\FeedbackModel;

class FeedbackController extends Controller
{
    protected FeedbackModel $feedbackModel;

    public function __construct()
    {
        $this->feedbackModel = new FeedbackModel();
    }
    public function feedback(Request $request)
    {

        if ($request->isGet()) {
            $data = [
                'comment' => 'sudas',
            ];
            echo $data['comment'];
            return $this->render('/feedback', $data);
        }


        if ($request->isPost()) {
            // var_dump($_POST['comment']);
            // var_dump($_SESSION['user_name']);
            $data = [
                'comment' => $_POST['comment'],
                'name' => $_SESSION['user_name'],

            ];
            
            // if (strlen($data['comment']) < 400 ){
            //     // echo 'swx';
            // }

            return $this->render('/feedback', $data);
        }
    }
}
