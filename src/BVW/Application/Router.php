<?php
namespace BVW\Application;

class Router 
{
    private $routes = array();
    
    public function __construct(array $routes = array())
    {
        $this->routes = $routes;
    }
    
    public function setRoutes(array $routes = array())
    {
        $this->routes = $routes;
        
        return $this;
    }
    
    public static function getCurrentRoute()
    {
        $currentRoute = explode("/", substr($_SERVER["REQUEST_URI"],1));
        if ($currentRoute[0] == null) {
            return "/";
        } elseif ($currentRoute[0] == "clientes") {
            return "clientes";
        }
        
        return $currentRoute[0];
    }
    
    public static function getFullRoute()
    {
        return substr($_SERVER["REQUEST_URI"],1);
    }
    
    public function getCurrentPage()
    {
        return $this->routes[self::getCurrentRoute()];
    }
    
    public function getPage($pageRoute)
    {
        return $this->routes[$pageRoute];
    }
    
    public function routeExists($route)
    {
        return array_key_exists($route, $this->routes);
    }
}
