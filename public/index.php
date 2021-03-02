<?php 

require_once '../vendor/autoload.php';

use app\core\Application;
use app\controller\PagesController;
use app\controller\UserController;



$app = new Application(dirname(__DIR__));

$app->router->get('/', [PagesController::class, 'home']);

$app->router->get('feedback', [PagesController::class, 'feedback']);

$app->router->get('register', [UserController::class, 'register']);
$app->router->post('register', [UserController::class, 'register']);

$app->router->get('login', [UserController::class, 'login']);
$app->router->post('login', [UserController::class, 'login']);






$app->run();