<?php
namespace LMS\controllers;
use LMS\models\User;

class AuthController
{
    public function index()
    {
       
        view('auth.login');

    }

    public function login()
    {
      
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new User();

            // Assign the input values
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];

            // Attempt to login
            $userData = $user->login();

            if ($userData) {
                // Successful login
                session_start();
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['user_name'] = $userData['name'];
                $_SESSION['user_role'] = $userData['role_id'];
                echo 'Login successful! Welcome, ' . $userData['name'];
                // Redirect or load a dashboard
                header("Location: dashboard");
                die();
            } else {
                // Failed login
                echo 'Invalid email or password.';
                view('auth.login'); // Show login view again
            }
        } else {
   
            // redirect('dashboard');
            view('auth.login'); // Show the login form
        }
    
    }
    public function register()
    {
        view('auth.register');

    }

    public function saveRegister()
    {
        // print_r($_SERVER['REQUEST_METHOD']);die; 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$user = new User;
            // print_r($user);die;
			$user->name = $_POST['name'];
			$user->email = $_POST['email'];
			$user->password = $_POST['password'];
            $user->role_id = 3;


			if($user->register()){
				echo 'user registered';
			}else{
				echo 'Unable to register user';
			}
		}

    }

    public function logout()
{
    // exit('akak');
    session_start();
    session_unset();
    session_destroy();
    // $this->index();
    header("Location: /");

}


}

// $obj=new AuthController();
//  $obj->index();