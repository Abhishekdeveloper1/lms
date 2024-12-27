<?php
namespace LMS\controllers;
use LMS\models\User;

class Dashboard
{
    public function index()
    {
       
        view('admin.dashboard',[],true);

    }

  

}

// $obj=new AuthController();
//  $obj->index();