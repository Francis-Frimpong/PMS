<?php
require_once 'app/Middleware/Auth.php';
require_once 'app/Controllers/NewEmployeeController.php';

use App\Controllers\AddEmployee;
use App\Middleware\Auth;
Auth::check(); 

$employeeList = new AddEmployee();

$data = $employeeList->showEmployeeList();

$lists = $data['list'];

$pageTitle = "Employees"


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
        <?php if(empty($lists)) :?>
            <tr>
              <td colspan="4">No employee added</td>
            </tr>
        <?php else :?>
          <?php foreach($lists as $list) :?>  
              <tr>
                <td><?php echo htmlspecialchars( $list['fullname'])?></td>
                <td><?php echo htmlspecialchars( $list['role'])?></td>
                <td>₵<?php echo htmlspecialchars($list['salary'])?></td>
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
          <?php endforeach?>
          
        <?php endif?>
        </tbody>
      </table>

      <div class="pagination">
        <button class="prev" disabled>&laquo; Previous</button>
        <span class="page-info">Page 1 of 5</span>
        <button class="next">Next &raquo;</button>
      </div>
    </div>
<?php require_once __DIR__ . '/app/partials/footer.php'; ?>
  
