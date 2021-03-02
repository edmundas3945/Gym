<?php

namespace app\controller;

use app\core\Controller;
use app\core\Request;

class UserController extends Controller
{
    public Validation $vld;

    public function __construct()
    {
        $this->vld = new Validation();
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

            $data['errors']['nameErr'] = $this->vld->validateName($data['name']);

            $data['errors']['surnameErr'] = $this->vld->validateName($data['surname']);

            $data['errors']['emailErr'] = $this->vld->validateEmail($data['email'], $this->userModel);

            $data['errors']['passwordErr'] = $this->vld->validatePassword($data['password'], 6, 10);

            $data['errors']['confirmPasswordErr'] = $this->vld->confirmPassword($data['confirmPassword']);

            $data['errors']['phoneErr'] = $this->vld->validatePhone($data['phone']);

        

            return $this->render('register', $data);
        }
    }
}
