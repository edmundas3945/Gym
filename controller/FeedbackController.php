<?php

namespace app\controller;

use app\core\Controller;

class FeedbackController extends Controller
{

    public function feedback()
    {
        $data = [
            'title' => 'This is your favorite gym\'s feedback',
            'description' => 'Tell me about your saiyan powers'
        ];

        return $this->render('/feedback', $data);
    }
}