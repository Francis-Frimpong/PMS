<?php
require_once 'app/Middleware/Auth.php';

use App\Middleware\Auth;

Auth::check(); // this will redir
?>
<?php require_once __DIR__ . '/app/partials/header.php'; ?>


    <div class="container main">
      <h1>Employees</h1>
      <button class="btn" onclick="location.href='add-employee.php'">
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
<?php require_once __DIR__ . '/app/partials/footer.php'; ?>
  
