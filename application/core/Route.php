<?php 
	
    namespace Application\core;

	class Route
	{
        public static function error() {
            header('HTTP/1.1 404 Not Found');
        }

        public static function start(){  

        $controller_name = 'First';
        $method = 'index';

        $routes = explode('?', $_SERVER['REQUEST_URI']);
       
        $routes = explode('/', $routes[0]);


        if(!empty($routes[1])){
        $controller_name = ucfirst($routes[1]);
        }
        if(!empty($routes[2])){
        $method = strtolower($routes[2]);
        }


        $model_name = 'Model_'.$controller_name;
        $model_file_name = MODELS. $model_name . '.php';
    
        if (file_exists($model_file_name)) {
            //include_once $model_file_name;
        } else {
            $model_name = null;
        }

        $controller_file = CONTROLLERS.'Controller_' . $controller_name . '.php';
        if (file_exists($controller_file)) {

            //include_once $controller_file;
            $controller_class = 'Application\controllers\Controller_'. $controller_name;

            if(class_exists($controller_class)){

                $actionName = new $controller_class($model_name);

                if(method_exists($actionName, $method)){
                        
                    $actionName->$method();

                }else{
                    self::error();
                }

            } else {
            self::error();
        }  
        } else {
            self::error();
        }    
        }
	}