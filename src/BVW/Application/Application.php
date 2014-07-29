<?php
namespace BVW\Application;

use BVW\Application\Router;
use BVW\Application\View\View;

class Application 
{
    private $config = array();
    private $router;
    private $view;
    
    public function __construct(Router $router, View $view)
    {
        $this->config = parse_ini_file(__DIR__."/Config/parameters.ini", true);
        $this->router = $router->setRoutes($this->getConfig("routes"));
        $this->view = $view;
    }
    
    public function getConfig($index)
    {
        return $this->config[$index];
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