<?php

namespace app\controller;

use app\core\Controller;
use app\core\Request;
use app\model\UserModel;

class UserController extends Controller
{
    public Validation $vld;
    protected UserModel $userModel;

    public function __construct()
    {
        $this->vld = new Validation();
        $this->userModel = new UserModel();
    }

    public function login(Request $request)
    {
        // have ability to change laout
        $this->setLayout('auth');

        if ($request->isGet()){
            $data = [
                'email' => '',
                'password' => '',
                'errors' => [
                    'emailErr' => '',
                    'passwordErr' => '',
                ]
            ];
            return $this->render('login', $data);
        }
        if ($request->isPost()) {
            // we get all post values sanitized
            $data = $request->getBody();

            // validation
            $data['errors']['emailErr'] = $this->vld->validateLoginEmail($data['email'], $this->userModel);

            $data['errors']['passwordErr'] = $this->vld->validateEmpty($data['password'], 'Please enter your password');

            // if there are no errors
            if ($this->vld->ifEmptyArr($data['errors'])) {
                // no errors
                // email was found and password was entered
                $loggedInUser = $this->userModel->login($data['email'], $data['password']);


                if ($loggedInUser) {
                    // create session
                    // password match
                    // die('email and passs match start session immediately');
                    $this->createUserSession($loggedInUser);
                    $request->redirect('/posts');
                } else {
                    $data['errors']['passwordErr'] = 'Wrong password or email';
                    // load view with errors
                    return $this->render('login', $data);
                }
            }

            return $this->render('login', $data);
        }
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

            if ($this->vld->ifEmptyArr($data['errors'])) {

                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                if ($this->userModel->register($data)) {

                    $request->redirect('/login');
                } else {
                    die('Something went wrong in adding user to db');
                }
            }

            return $this->render('register', $data);
        }
    }
}
