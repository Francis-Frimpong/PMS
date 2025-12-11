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
    <title>Payroll - Payroll App</title>
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
      <h1>Payroll</h1>
      <button class="btn" onclick="location.href='add-payroll.html'">
        Add Payroll Record
      </button>

      <table>
        <thead>
          <tr>
            <th>Employee</th>
            <th>Amount</th>
            <th>Date Paid</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>John Doe</td>
            <td>$2000</td>
            <td>2025-12-01</td>
            <td>
              <button class="btn" style="background: #10b981">Edit</button>
              <button class="btn" style="background: #ef4444">Delete</button>
            </td>
          </tr>
          <tr>
            <td>Jane Smith</td>
            <td>$1500</td>
            <td>2025-12-01</td>
            <td>
              <button class="btn" style="background: #10b981">Edit</button>
              <button class="btn" style="background: #ef4444">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </body>
</html>
