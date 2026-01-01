<?php
require_once 'app/Middleware/Auth.php';
require_once 'app/Controllers/PayrollRecordController.php';
require_once 'app/Core/Flash.php';


use App\Middleware\Auth;
use App\Controllers\AddPayrollRecords;
use App\Core\FlashMessage;


Auth::check(); 

$displayPayroll = new AddPayrollRecords();


$payrollData = $displayPayroll->showPayrollList();
$payrollLists = $payrollData['list'];


$page = $payrollData['page'];
$totalPages = $payrollData['totalPages'];

$pageTitle = "Payroll";

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
          <?php if(empty($payrollLists)): ?>
            <tr>
               <td colspan="4">No payroll data</td>
           </tr>
          <?php else :?> 
            <?php foreach($payrollLists as $payroll) :?>
              
              <tr>
                <td><?php echo htmlspecialchars($payroll['employee_name'])?></td>
                <td>₵<?php echo htmlspecialchars($payroll['net_salary'])?></td>
                <td><?php echo htmlspecialchars($payroll['payment_date'])?></td>
                <td>
                  <a href="editPayroll.php?id=<?= $payroll['payroll_id'] ?>" class="btn" style="background: #10b981">Edit</a>
                  
                  <button class="btn" style="background: #ef4444">Delete</button>
                </td>
              </tr>
              
            <?php endforeach;?>
          <?php endif;?>
          
        </tbody>
      </table>
    </div>

    <!-- pagination -->
     <div class="pagination">

        <!-- Previous -->
        <?php if ($page > 1): ?>
          <a class="prev" href="?page=<?= $page - 1 ?>">&laquo; Previous</a>
        <?php else: ?>
          <span class="prev disabled">&laquo; Previous</span>
        <?php endif; ?>

        <!-- Page info -->
        <span class="page-info">
          Page <?= $page ?> of <?= $totalPages ?>
        </span>

        <!-- Next -->
        <?php if ($page < $totalPages): ?>
          <a class="next" href="?page=<?= $page + 1 ?>">Next &raquo;</a>
        <?php else: ?>
          <span class="next disabled">Next &raquo;</span>
        <?php endif; ?>

      </div>

<?php require_once __DIR__ . '/app/partials/footer.php'; ?>
 
