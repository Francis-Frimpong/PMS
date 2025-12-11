<?php
require_once 'app/Middleware/Auth.php';

use App\Middleware\Auth;

Auth::check(); // this will redir
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employees - Payroll App</title>
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
      <h1>Employees</h1>
      <button class="btn" onclick="location.href='add-employee.html'">
        Add New Employee
      </button>

      <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Salary</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>John Doe</td>
            <td>Manager</td>
            <td>$2000</td>
            <td>
              <button
                class="btn"
                style="background: #10b981"
                onclick="location.href='add-employee.html'"
              >
                Edit
              </button>
              <button class="btn" style="background: #ef4444">Delete</button>
            </td>
          </tr>
          <tr>
            <td>Jane Smith</td>
            <td>Developer</td>
            <td>$1500</td>
            <td>
              <button
                class="btn"
                style="background: #10b981"
                onclick="location.href='add-employee.html'"
              >
                Edit
              </button>
              <button class="btn" style="background: #ef4444">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="pagination">
        <button class="prev" disabled>&laquo; Previous</button>
        <span class="page-info">Page 1 of 5</span>
        <button class="next">Next &raquo;</button>
      </div>
    </div>
  </body>
</html>
