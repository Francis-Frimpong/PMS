<?php
namespace App\Controllers;

require_once __DIR__ . '/../Database/Database.php';
require_once __DIR__ . '/../Models/Login.php';

use App\Models\Login;
use App\Database\Database;

class LoginController
{
    private $login;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->login = new Login($pdo);
    }

    // GET /login
    public function showLogin()
    {
        require 'app/Views/auth/login.php';
    }


    public function authenticate()
    {

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $username = trim($_POST['username']);
            $password = $_POST['password'];

            if(empty($username) || empty($password)){
            header('Location: /PMS/login');
            exit;
        }

        $user = $this->login->login($username);

        if(!$user || !password_verify($password, $user['password'])){
            header('Location: /PMS/login');
            exit;
        }

       
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        header('Location: /PMS/dashboard');
        exit;
        }}
}