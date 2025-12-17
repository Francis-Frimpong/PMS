<?php
require_once 'app/Middleware/Auth.php';

use App\Middleware\Auth;

Auth::check(); 

$pageTitle = "Reports"

?>
<?php require_once __DIR__ . '/app/partials/header.php'; ?>


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
<?php require_once __DIR__ . '/app/partials/footer.php'; ?>
  
