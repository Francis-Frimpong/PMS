<?php
namespace app\Controllers;

class LogoutController{
    public static function logout(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
            session_unset();
            session_destroy();
            header("Location:/PMS/login");
            exit;    
    }
}