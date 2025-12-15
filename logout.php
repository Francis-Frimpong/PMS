<?php
require_once 'app/Controllers/LogoutController.php';

 if($_SERVER['REQUEST_METHOD'] === 'POST'){
     Logout::logout();
 }


?>