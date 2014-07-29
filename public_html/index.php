<?php
session_start();
require_once(__DIR__."/../vendor/autoload.php");

$router = new \BVW\Application\Router();
$view = new BVW\Application\View\View();

$app = new \BVW\Application\Application($router, $view);

$app->run();