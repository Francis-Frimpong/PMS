<?php
require_once 'app/Middleware/Auth.php';

use App\Middleware\Auth;

Auth::check(); 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payroll App - Dashboard</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="navbar">
      <a href="dashboard.php">Dashboard</a>
      <a href="employees.php">Employees</a>
      <a href="payroll.php">Payroll</a>
      <a href="reports.php">Reports</a>
  
    </div>
    <div class="container main">
      <h1>Dashboard</h1>
      <div class="flex-row" style="gap: 20px; flex-wrap: wrap">
        <div
          style="
            flex: 1;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
          "
        >
          <h3>Total Employees</h3>
          <p>25</p>
        </div>
        <div
          style="
            flex: 1;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
          "
        >
          <h3>Total Payroll</h3>
          <p>$50,000</p>
        </div>
      </div>
    </div>
  </body>
</html>
