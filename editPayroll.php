<?php
require_once 'app/Middleware/Auth.php';
require_once 'app/Controllers/editpayrollController.php';


use App\Controllers\AddPayrollRecords;
use App\Controllers\UpdatePayrollData;


use App\Middleware\Auth;

Auth::check(); 


$controller = new UpdatePayrollData();
$data = $controller->UpdatePayrollRecords();

$payroll   = $data['payroll'];
$employees = $data['employees']; 
$id = $_GET['id'];


$pageTitle = "Edit Payroll Records"

?>
<?php require_once __DIR__ . '/app/partials/header.php'; ?>


    <div class="container main" style="max-width: 500px; margin-top: 30px">
      <h1>Edit Payroll Record</h1>
  <form action="editPayroll.php?id=<?= $id ?>" method="POST">
   <select name="employee_id" required>
      <option value="">Select Employee</option>

      <?php foreach ($employees as $employee): ?>
        <option 
          value="<?= $employee['id'] ?>"
          <?= $employee['id'] == $payroll['employee_id'] ? 'selected' : '' ?>
        >
          <?= htmlspecialchars($employee['full_name']) ?>
        </option>
      <?php endforeach; ?>
    </select>


    <label>Pay Period</label>
    <input type="text" name="pay_period" placeholder="e.g. January 20.." 
    value="<?= htmlspecialchars($payroll['pay_period']) ?>" required />
    
    <label>Gross Salary</label>
    <input type="number" step="0.01" name="gross_salary" placeholder="Gross Salary" value="<?= htmlspecialchars($payroll['gross_salary']) ?>" required />

    <label>Tax</label>
    <input type="number" step="0.01" name="tax" placeholder="Tax" value="<?= htmlspecialchars($payroll['tax']) ?>" required />

    <label>Deductions</label>
    <input type="number" step="0.01" name="deductions" placeholder="Deductions" value="<?= htmlspecialchars($payroll['deductions']) ?>" required />

    <label>Net Salary</label>
    <input type="number" step="0.01" name="net_salary" placeholder="Net Salary" value="<?= htmlspecialchars($payroll['net_salary']) ?>" required />

    <label>Payment Date</label>
    <input type="date" name="payment_date" value="<?= htmlspecialchars($payroll['payment_date']) ?>" required />

    <button type="submit">Save Update</button>
</form>

    </div>
<?php require_once __DIR__ . '/app/partials/footer.php'; ?>
 
