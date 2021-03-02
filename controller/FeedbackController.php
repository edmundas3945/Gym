<?php

namespace app\controller;

use app\core\Controller;
use app\core\Request;
use app\model\FeedbackModel;
use app\controller\Validation;

class FeedbackController extends Controller
{
    public Validation $vld;
    protected FeedbackModel $feedbackModel;

    public function __construct()
    {
        $this->feedbackModel = new FeedbackModel();
        $this->vld = new Validation();
    }
    public function feedback(Request $request)
    {

        if ($request->isGet()) {
            
            $data['comments'] = $this->feedbackModel->getFeedback();
            // echo '<pre>';
            // print_r($data['comments']);
            // echo '</pre>';
            return $this->render('/feedback', $data);
        }


        if ($request->isPost()) {
            // var_dump($_POST['comment']);
            // var_dump($_SESSION['user_name']);
            $data = $request->getBody();
            $data['comments'] = $this->feedbackModel->getFeedback();
            // echo '<pre>';
            // var_dump($data['comments']);
            // echo '</pre>';

            $data['commentErr'] = $this->vld->validateComment($data['comment']);

            if (empty($data['commentErr'])){
                $this->feedbackModel->createComment($data);
            }

            return $this->render('/feedback', $data);
        }
    }
}
