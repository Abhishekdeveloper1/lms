<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
define('APP_ROOT', __dir__);
// echo APP_ROOT;
require_once (APP_ROOT. '/vendor/autoload.php');

// autoloader for namespaced classes
spl_autoload_register(function($class){

	$classFile = str_replace("\\", DIRECTORY_SEPARATOR, $class.'.php');

	$classPath = APP_ROOT.'/src/'.$classFile;
//    exit('alaka');
	if(file_exists($classPath)){
		require_once($classPath);
	}
});

// asset('extra-libs/c3/c3.min.css');
// $data['val']='abhishek';
// $data['val1']='abhisheks';

// view('admin.dashboard',$data,true);
// view('auth.login',$data,false);

/*
use LMS\config\Database;

try {
    $db = new Database('localhost', 'root', 'pintu123', 'lms2512202401234');
    // print_r($db); die;

    $connection = $db->connect();

    if ($connection) {
        echo "Database connected successfully!";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
*/
// echo APP_ROOT.'/routes/routes.php';die;
use LMS\services\Routes;
$route = new Routes();
// print_r($route);die;
require_once(APP_ROOT.'/routes/routes.php');
$route->handle();