<?php
// exit('ahajaj');
use LMS\services\Routes;
// Routes::get('login','LoginController','index');
// Routes::add('/','LoginController','index');
Routes::get('', 'AuthController', 'index');


Routes::post('login', 'AuthController', 'login');
Routes::get('register', 'AuthController', 'register');
Routes::post('saveRegister', 'AuthController', 'saveRegister');
Routes::get('logout', 'AuthController', 'logout');

Routes::get('dashboard', 'Dashboard', 'index');



