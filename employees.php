<?php
require_once 'app/Middleware/Auth.php';
require_once 'app/Controllers/NewEmployeeController.php';
require_once 'app/Core/Flash.php';

use App\Controllers\AddEmployee;
use App\Middleware\Auth;
use App\Core\FlashMessage;
$adminId = Auth::check(); 
$flashMessage = FlashMessage::getMessage();




$employeeList = new AddEmployee();
$data = $employeeList->showEmployeeList();




$lists = $data['list'];
$page = $data['page'];
$totalPages = $data['totalPages'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $employeeList->delete($_POST['id']);
}

$pageTitle = "Employees";

?>
<?php require_once __DIR__ . '/app/partials/header.php'; ?>

<?php if($flashMessage):?>
   <div class="message-banner <?= $flashMessage['type'] ?>">
    <?= htmlspecialchars($flashMessage['message']) ?>

    <button class="close <?= $flashMessage['type'] ?>">X</button>
  </div>

<?php endif;?>


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
               <a href="updateEmployee.php?id=<?php echo $list['id']?>" class="btn" style="background: #05b96eff">Edit</a>

                  <a href="employee-detail.php?id=<?= $list['id'] ?>" class="btn" style="background: #efde44ff">
                    Details
                  </a>
                    <button class="btn deleteBtn" style="background-color: #d3381dff;"  data-id="<?= $list['id'] ?>">
                        Delete
                    </button>

                </td>
              </tr>
          <?php endforeach?>
          
        <?php endif?>
        </tbody>
      </table>

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

      <!-- Delete Modal -->
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
  
