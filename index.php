<?php
  session_start();
  require 'app/Database/Database.php';
  require 'app/Models/Login.php';
  require 'app/Controllers/LoginController.php';

  use App\Controllers\LoginController;

  $loginController = new LoginController();

  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if(empty($username) || empty($password)){
      header('Location: index.php');
      exit;
    }

    $loginController->login($username, $password);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payroll App - Login</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="container" style="max-width: 400px; margin-top: 50px">
      <h2 style="text-align: center; margin-bottom: 20px">Login</h2>
      <form action="index.php" method="POST">
        <input type="text" placeholder="Username" name="username" required />
        <input
          type="password"
          placeholder="Password"
          name="password"
          required
        />
        <button type="submit">Login</button>
        <a
          href="#"
          style="
            text-align: center;
            display: block;
            margin-top: 10px;
            color: #4f46e5;
          "
          >Forgot Password?</a
        >
      </form>
    </div>
  </body>
</html>
