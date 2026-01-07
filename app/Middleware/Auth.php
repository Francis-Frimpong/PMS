<?php
namespace App\Middleware;
class Auth{
    public static function check(){
         if (session_status() === PHP_SESSION_NONE) {
            session_start(); // only start if not started
        }


        if(!isset($_SESSION['user_id'])){
            header('Location: index.php');
            exit;
        }
        
    }
}