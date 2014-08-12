<?php
require_once(__DIR__."/../vendor/autoload.php");

use BVW\Application\Router;
use BVW\Application\View\View;
use BVW\Application\Application;

$app = new Application(new Router(), new View());

$app->run();