<?php
namespace LMS\services;

class Routes{

	private static $routes = [];
	private static $controllerNamespace = 'LMS\controllers\\';

	public static function add($uri, $controller,$action, $method='GET',$middleware=[])
	{
		self::$routes[] = [
			'method'=> $method,
			'uri'=> $uri,
			'controller'=> $controller,
			'action'=> $action,
			'middleware' => $middleware
		];
	}

	public static function get($uri, $controller,$action,$middleware=[]){
		self::add($uri,$controller,$action,'GET',$middleware);
	}

	public static function post($uri, $controller,$action,$middleware=[]){
		self::add($uri,$controller,$action,'POST',$middleware);
	}

	

	public static function handle(){
		$requestURI = $_SERVER['REQUEST_URI'];
        // $requestURI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Remove query strings if present

		$requestMethod = $_SERVER['REQUEST_METHOD'];
        echo $requestURI;echo '<br>';

		foreach(self::$routes as $route){
			// echo $route['uri'];die;
// print_r($route);die;
// $routeURI = '/lms/' . trim($route['uri'], '/'); // Trim leading and trailing slashes
// echo $routeURI;die;
			if('/'.$route['uri'] === $requestURI && $route['method'] == $requestMethod){
                // if($routeURI === $requestURI && $route['method'] == $requestMethod){
// exit('sjsj');
				// handle middleware 
				foreach($route['middleware'] as $middleware){
					$middlewareClass = new $middleware;
					$middlewareClass->handle();
				}


				$controllerClass = self::$controllerNamespace.$route['controller'];
                // print_r($route['controller']);die;

				$action = $route['action'];

				$controller = new $controllerClass();
				$controller->$action();
				return;
			}
		}
		echo '404 - page not found';
	}

  

}