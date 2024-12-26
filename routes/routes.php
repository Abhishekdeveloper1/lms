<?php
// exit('ahajaj');
use LMS\services\Routes;
// Routes::get('login','LoginController','index');
// Routes::add('/','LoginController','index');
Routes::get('', 'LoginController', 'index');


Routes::post('login', 'LoginController', 'login');
