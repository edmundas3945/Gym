<?php 

require_once '../vendor/autoload.php';

use app\core\Application;
use app\controller\PagesController;
use app\controller\UserController;
use app\controller\FeedbackController;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config =[
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [PagesController::class, 'home']);

$app->router->get('feedback', [FeedbackController::class, 'feedback']);
$app->router->post('feedback', [FeedbackController::class, 'feedback']);

$app->router->get('register', [UserController::class, 'register']);
$app->router->post('register', [UserController::class, 'register']);

$app->router->get('login', [UserController::class, 'login']);
$app->router->post('login', [UserController::class, 'login']);

$app->router->get('logout', [UserController::class, 'logout']);


$app->run();