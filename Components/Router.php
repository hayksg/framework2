<?php

class Router 
{
    private $config;
    const ROUTES_PATH = ROOT . 'config/routes.php';
    
    public function __construct() 
    {
        $this->config = include(self::ROUTES_PATH);
    }
    
    private function getURI() : string
    {
        $uri = $_SERVER['REQUEST_URI'];
        
        if (isset($uri)) {
            return trim(filter_var($uri, FILTER_SANITIZE_URL), '/');
        }
    }
    
    public function run() 
    {
        // Get uri
        
        $uri = $this->getURI();
        
        // Check if exists uri in routes.php
        foreach ($this->config as $uriPattern => $path) {
            
            // If exists get controller and action names
            $pattern = "~^$uriPattern(?![\w /])~";
            if (preg_match($pattern, $uri)) {
                
                $internalRoute = preg_replace($pattern, $path, $uri);
                $segments = explode('/', $internalRoute);
                
                $controllerName = ucfirst(array_shift($segments)) . 'Controller';
                $actionName     = array_shift($segments) . 'Action';
                
                $arguments = $segments;

                // Create controller file
                $controllerFile = ROOT . 'Controller/' . $controllerName . '.php';
                
                if (is_file($controllerFile)) {
                    include_once($controllerFile);
                }
                
                // Initialize object, invoke method (action)
                $controllerObject = new $controllerName;
                $result = call_user_func_array([$controllerObject, $actionName], $arguments);
                
                if ($result != null) {
                    break;
                }
            }
        }
    }
}
