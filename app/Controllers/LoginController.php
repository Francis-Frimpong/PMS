<?php
namespace App\Controllers;

use App\Models\Login;
use App\Database\Database;

class LoginController{
    private $login;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->login = new Login($pdo);
    }

    public function login($username, $password){
        $user = $this->login->login($username);

        if(!$user){
            header('Location:index.php');
            exit;
        }

        if(password_verify($password, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header('Location:dashboard.php');
            exit;

        }

         header('Location:index.php');
         exit;
    }
}