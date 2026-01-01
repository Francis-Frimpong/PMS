<?php
require_once 'app/Middleware/Auth.php';
require_once 'app/Controllers/PayrollRecordController.php';
require_once 'app/Core/Flash.php';


use App\Middleware\Auth;
use App\Controllers\AddPayrollRecords;
use App\Core\FlashMessage;


Auth::check(); 
$flashMessage = FlashMessage::getMessage();

$displayPayroll = new AddPayrollRecords();


$payrollData = $displayPayroll->showPayrollList();
$payrollLists = $payrollData['list'];


$page = $payrollData['page'];
$totalPages = $payrollData['totalPages'];

// delete payroll data
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])){
  $displayPayroll->deletepayroll($_POST['id']);
}

$pageTitle = "Payroll";

?>
<?php require_once __DIR__ . '/app/partials/header.php'; ?>

<?php if($flashMessage):?>
   <div class="message-banner <?= $flashMessage['type'] ?>">
    <?= htmlspecialchars($flashMessage['message']) ?>

    <button class="close <?= $flashMessage['type'] ?>">X</button>
  </div>

<?php endif;?>


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
                  
                 <button class="btn deleteBtn" style="background-color: #d3381dff;"  data-id="<?= $payroll['payroll_id'] ?>">
                        Delete
                  </button>
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

       <div class="modal-overlay" id="modal">
      <div class="modal-box">
        <h3>Delete Employee?</h3>
          <p>Do you want to delete this employee?
        <div class="modal-actions">
          <form action="employees.php" method="POST">
            <input type="hidden" name="id" id="deleteId">
            <button type="submit" class="btn delete-btn">Delete</button>
          </form>

          <button class="btn cancel-btn">Cancel</button>
        </div>
      </div>
    </div>

<?php require_once __DIR__ . '/app/partials/footer.php'; ?>
 
