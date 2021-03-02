<?php 

namespace app\controller;

use app\core\Controller;
use app\model\FeedbackModel;

class API extends Controller
{

    public Validation $vld;
    protected FeedbackModel $feedbackModel;

    public function __construct()
    {
        $this->feedbackModel = new FeedbackModel();
        $this->vld = new Validation();
    }

    public function comments()
    {

    }
}