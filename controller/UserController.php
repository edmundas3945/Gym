<?php

namespace app\controller;

use app\core\Controller;
use app\core\Request;

class UserController extends Controller
{

    public function __construct()
    {
        
    }


    public function register(Request $request)
    {
        $this->setLayout('auth');

        if ($request->isGet()){
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
        
        
    }




   
}