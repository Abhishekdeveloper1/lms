<?php

function view($file_path){
	$path = str_replace("\\",DIRECTORY_SEPARATOR,$file_path);

	$path = str_replace('.',DIRECTORY_SEPARATOR,$path);

	$file = APP_ROOT.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.$path.'.php';
	
	if(file_exists($file)){
		return require $file;
	}

	throw new Exception('Page not found'. $file);
}
function pageAdd($file_path){
	include(APP_ROOT.'/views/'.$file_path);
}
function redirect($url){

	header("Location: $url");
	exit();
}

function filePAth($file_path)
{
// return APP_ROOT.$file_path;

    // echo $file_path;
    $file_path = ltrim($file_path, '/');

    // Return the normalized full path
    return rtrim(APP_ROOT, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $file_path;


}

function asset_1($file_path)
{
    // Define the base URL for assets (relative to the web root)
    $baseURL = '/assets';

    // Normalize the file path
    $file_path = ltrim($file_path, '/');
// echo $baseURL . '/' . $files_path;die;
    // Return the full URL
    return $baseURL . '/' . $file_path;
}
function asset($file_path)
{
    // Get the current protocol (http or https)
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';

    // Get the host and base URL (adjust the domain as needed)
    $host = $_SERVER['HTTP_HOST']; // e.g., localhost
    $basePath = '/lms/assets'; // Adjust this path based on your actual app structure

    // Normalize the file path to remove any leading slashes
    $file_path = ltrim($file_path, '/');

    // Return the full URL
    return $protocol . '://' . $host . $basePath . '/' . $file_path;
}
