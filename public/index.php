<?php 

use app\core\Application;
use app\controller\PagesController;

require_once '../vendor/autoload.php';

$app = new Application(dirname(__DIR__));

$app->router->get('/', [PagesController::class, 'home']);




$app->run();