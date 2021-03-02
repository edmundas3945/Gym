<?php

namespace app\controller;

use app\core\Controller;
use app\core\Request;

class PagesController extends Controller
{
    public function home()
    {
        $params = [
            'title' => 'This is your favorite gym',
            'description' => 'Don\'t you know pump it up'
        ];

        return $this->render('/home', $params);
    }

    public function feedback()
    {
        $data = [
            'title' => 'This is your favorite gym\'s feedback',
            'description' => 'Tell me about your saiyan powers'
        ];

        return $this->render('/feedback', $data);
    }
}