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
    <title>Reports - Payroll App</title>
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
      <h1>Reports</h1>
      <form
        style="margin-bottom: 20px; display: flex; gap: 10px; flex-wrap: wrap"
      >
        <select>
          <option value="">Select Employee</option>
          <option value="john">John Doe</option>
          <option value="jane">Jane Smith</option>
        </select>
        <input type="month" />
        <button class="btn">Generate Report</button>
      </form>

      <table>
        <thead>
          <tr>
            <th>Employee</th>
            <th>Salary</th>
            <th>Date Paid</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>John Doe</td>
            <td>$2000</td>
            <td>2025-12-01</td>
          </tr>
          <tr>
            <td>Jane Smith</td>
            <td>$1500</td>
            <td>2025-12-01</td>
          </tr>
        </tbody>
      </table>
    </div>
  </body>
</html>
