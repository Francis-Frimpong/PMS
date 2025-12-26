<?php
require_once 'app/Middleware/Auth.php';
require_once 'app/Controllers/NewEmployeeController.php';
require_once 'app/Core/Flash.php';

use App\Controllers\AddEmployee;
use App\Core\FlashMessage;

use App\Middleware\Auth;

Auth::check(); 

$employeeList = new AddEmployee();
$data = $employeeList->showEmployeeList();
$lists = $data['list'];
// $page = $data['page'];
// $totalPages = $data['totalPages'];

$pageTitle = "Add Payroll Records"

?>
<?php require_once __DIR__ . '/app/partials/header.php'; ?>


    <div class="container main" style="max-width: 500px; margin-top: 30px">
      <h1>Add Payroll Record</h1>
  <form action="add-employee.php" method="POST">
    <select name="employee_id" required>
      <option value="">Select Employee</option>
      <?php foreach($lists as $list): ?>
        <option value="<?= $list['id'] ?>"><?=  htmlspecialchars($list['fullname']) ?></option>
      <?php endforeach ?>
     
    </select>

    <label>Pay Period</label>
    <input type="text" name="pay_period" placeholder="e.g. January 20.." required />
    
    <label>Gross Salary</label>
    <input type="number" name="gross_salary" placeholder="Gross Salary" required />

    <label>Tax</label>
    <input type="number" name="tax" placeholder="Tax" required />

    <label>Deductions</label>
    <input type="number" name="deductions" placeholder="Deductions" required />

    <label>Net Salary</label>
    <input type="number" name="net_salary" placeholder="Net Salary" required />

    <label>Payment Date</label>
    <input type="date" name="payment_date" required />

    <button type="submit">Save</button>
</form>

    </div>
<?php require_once __DIR__ . '/app/partials/footer.php'; ?>
 
