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
    <title>Add Payroll Record - Payroll App</title>
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
      <h1>Add Payroll Record</h1>
      <form>
        <select required>
          <option value="">Select Employee</option>
          <option value="john">John Doe</option>
          <option value="jane">Jane Smith</option>
        </select>
        <input type="number" placeholder="Amount" required />
        <input type="date" required />
        <button type="submit">Save</button>
      </form>
    </div>
  </body>
</html>
