<?php
namespace App\Middleware;
class Auth{
    public static function check(){
        session_start();

        if(!isset($_SESSION['user_id'])){
            header('Location: index.php');
            exit;
        }
        
    }
}