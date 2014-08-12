<?php
namespace BVW\Application;

use BVW\Application\Router;
use BVW\Application\View\View;

class Application 
{
    private static $config = array();
    private $router;
    private $view;
    
    public function __construct(Router $router, View $view)
    {
        self::$config = parse_ini_file(__DIR__."/Config/parameters.ini", true);
        $this->router = $router->setRoutes(self::getConfig("routes"));
        $this->view = $view;
    }
    
    public static function getConfig($index)
    {
        return self::$config[$index];
    }
    
    public function run()
    {
        if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js)$/', $_SERVER["REQUEST_URI"])) {
            return false;
        } elseif ($this->router->routeExists(Router::getCurrentRoute())) {
            $this->view->render($this->router->getCurrentPage());
        } else {    
            $this->view->render($this->router->getPage("404"));
        }
    }
}