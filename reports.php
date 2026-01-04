<?php
require_once 'app/Middleware/Auth.php';
require_once 'app/Controllers/NewEmployeeController.php';
require_once 'app/Controllers/PayrollRecordController.php';

use App\Middleware\Auth;
use App\Controllers\AddEmployee;
use App\Controllers\AddPayrollRecords;

Auth::check(); 

$employeeList = new AddEmployee();

$payroll = new AddPayrollRecords();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $payroll->downloadPayslip();
}



$data = $employeeList->showEmployeeList();
$lists = $data['list'];

$pageTitle = "Reports"

?>
<?php require_once __DIR__ . '/app/partials/header.php'; ?>


    <div class="container main">
      <h1>Reports</h1>
      <form action="reports.php" method="POST"
        style="margin-bottom: 20px; display: flex; gap: 10px; flex-wrap: wrap"
      >
        <select name="employee_id" required>
          <option value="">Select Employee</option>
          <?php foreach ($lists as $list): ?>
            <option value="<?= $list['id'] ?>">
              <?= htmlspecialchars($list['full_name']) ?>
            </option>
          <?php endforeach ?>
        </select>

        <input type="month" name="month" required />

        <button type="submit" class="btn">Generate Payroll</button>
      </form>


    </div>
<?php require_once __DIR__ . '/app/partials/footer.php'; ?>
  
