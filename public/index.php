<?php
require_once '../app/vendor/autoload.php';
require_once "../app/core/Controller.php";
require_once "../app/models/User.php";
require_once "../app/models/Post.php";
require_once "../app/controllers/MainController.php";
require_once "../app/controllers/UserController.php";
require_once "../app/controllers/PostController.php";
use app\controllers\MainController;
use app\controllers\UserController;
use app\controllers\PostController;


$url = $_SERVER["REQUEST_URI"];

//todo add a switch statement router to route based on the url
//if it is "/posts" return an array of posts via the post controller
//if it is "/" return the homepage view from the main controller
//if it is something else return a 404 view from the main controller

$urlParts = explode('/', $url);


$urlParts = array_values(array_filter($urlParts));


$controllerName = ucfirst($urlParts[0]) . 'Controller';
$methodName = $urlParts[1] ?? 'index';


if (class_exists('app\\controllers\\' . $controllerName)) {
    $controller = new $controllerName();

    if (method_exists($controller, $methodName)) {
        echo $controller->$methodName();
    } else {
        $mainController = new MainController();
        echo $mainController->notFound();
    }
} else {
    $mainController = new MainController();
    echo $mainController->notFound();
}
?>
