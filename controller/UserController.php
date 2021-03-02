<?php

namespace app\controller;

use app\core\Controller;
use app\core\Request;

class UserController extends Controller
{

    public function __construct()
    {
    }

    public function login(Request $request)
    {
        // have ability to change laout
        $this->setLayout('auth');

        if ($request->isGet()) :
            $data = [
                'email' => '',
                'password' => '',
                'errors' => [
                    'emailErr' => '',
                    'passwordErr' => '',
                ]
            ];
            return $this->render('login', $data);
        endif;


    }

    public function register(Request $request)
    {
        $this->setLayout('auth');

        if ($request->isGet()) {
            $data = [
                'name' => '',
                'surname' => '',
                'email' => '',
                'password' => '',
                'phone' => '',
                'address' => '',
                'confirmPassword' => '',
                'errors' => [
                    'nameErr' => '',
                    'surnameErr' => '',
                    'emailErr' => '',
                    'phoneErr' => '',
                    'passwordErr' => '',
                    'confirmPasswordErr' => '',
                ],
                'currentPage' => 'register',
            ];
            return $this->render('register', $data);
        }

        if ($request->isPost()) {
            $data = $request->getBody();

            return $this->render('register', $data);
        }
    }
}
