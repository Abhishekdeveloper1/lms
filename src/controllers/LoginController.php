<?php
namespace LMS\controllers;
class LoginController
{
    public function index()
    {
        // exit('akkaka');
        // echo 'LoginController index funxtion';
        view('auth.login');

    }

    public function login()
    {
        // exit('akkaka');
        // echo 'LoginController index funxtion';die;
        view('auth.login');

    }
}

$obj=new LoginController();
 $obj->index();