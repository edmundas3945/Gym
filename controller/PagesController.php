<?php

namespace app\controller;

use app\core\Controller;

class PagesController extends Controller
{
    public function home()
    {
        $params = [
            'title' => 'This is your favorite gym',
            'description' => 'Don\'t you know pump it up'
        ];

        return $this->render('home', $params);
    }
    public function feedback()
    {
        $params = [
            'title' => 'This is your favorite gym\'s feedback',
            'description' => 'Tell me about your saiyan powers'
        ];

        return $this->render('feedback', $params);
    }
}