<?php
session_start();
require_once(__DIR__."/../vendor/autoload.php");

$app = new \BVW\Application\Application();

$app->run();