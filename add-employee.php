<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Employee - Payroll App</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="navbar">
      <a href="dashboard.php">Dashboard</a>
      <a href="employees.php">Employees</a>
      <a href="payroll.php">Payroll</a>
      <a href="reports.php">Reports</a>
    </div>

    <div class="container main" style="max-width: 500px; margin-top: 30px">
      <h1>Add / Edit Employee</h1>
      <form>
        <input type="text" placeholder="Full Name" required />
        <input type="text" placeholder="Role" required />
        <input type="text" placeholder="Department" required />
        <input type="number" placeholder="Salary" required />
        <select required>
          <option value="">Payment Type</option>
          <option value="monthly">Monthly</option>
          <option value="hourly">Hourly</option>
        </select>
        <button type="submit">Save</button>
      </form>
    </div>
  </body>
</html>
