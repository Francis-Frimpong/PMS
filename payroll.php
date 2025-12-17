<?php
require_once 'app/Middleware/Auth.php';

use App\Middleware\Auth;

Auth::check(); 

$pageTitle = "Payroll"

?>
<?php require_once __DIR__ . '/app/partials/header.php'; ?>


    <div class="container main">
      <h1>Payroll</h1>
      <button class="btn" onclick="location.href='add-payroll.php'">
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
<?php require_once __DIR__ . '/app/partials/footer.php'; ?>
 
