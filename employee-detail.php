<?php
require_once 'app/Middleware/Auth.php';
require_once 'app/Controllers/NewEmployeeController.php';
require_once 'app/Database/Database.php';
require_once 'app/Models/editUser.php';

use App\Middleware\Auth;
use App\Models\EditUser;
use App\Database\Database;

Auth::check(); 

$pdo = Database::getConnection();
$employeeModel = new EditUser($pdo);

$id = $_GET['id'] ?? null;

if (!$id) {
    die("No employee selected");
}

$employee = $employeeModel->selectUser($id);

if (!$employee) {
    die("Employee not found");
}
?>


<?php require_once __DIR__ . '/app/partials/header.php'; ?>


<div class="container main">
  <div class="detail-card">
    <div class="detail-title">Employee Details</div>

    <?php if(isset($id)):?>
        <div class="detail-grid">
          <div class="detail-item">
            <span>Full Name</span>
            <strong><?=  htmlspecialchars($employee['fullname']) ?></strong>
          </div>
    
          <div class="detail-item">
            <span>Email</span>
            <strong><?=  htmlspecialchars($employee['email']) ?></strong>
          </div>
    
          <div class="detail-item">
            <span>Phone</span>
            <strong><?=  htmlspecialchars($employee['phone']) ?></strong>
          </div>
    
          <div class="detail-item">
            <span>Role</span>
            <strong><?=  htmlspecialchars($employee['role']) ?></strong>
          </div>
    
          <div class="detail-item">
            <span>Payment Type</span>
            <strong><?=  htmlspecialchars($employee['salary_payment_type']) ?></strong>
          </div>
    
          <div class="detail-item">
            <span>Salary</span>
            <strong>₵ <?=  htmlspecialchars($employee['salary']) ?></strong>
          </div>
    
          <div class="detail-item">
            <span>Date Hired</span>
            <strong><?=  htmlspecialchars($employee['date_hired']) ?></strong>
          </div>
        </div>
    <?php endif?>



    <div class="detail-actions">
      <a href="employees.php" class="btn">Back</a>
      <a href="updateEmployee.php?id=<?= $id?>" class="btn">Edit</a>
    </div>
  </div>
</div>



<?php require_once __DIR__ . '/app/partials/footer.php'; ?>