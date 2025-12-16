<?php
require_once 'app/Middleware/Auth.php';
require_once 'app/Controllers/NewEmployeeController.php';

use App\Middleware\Auth;
use App\Controllers\AddEmployee;

$AddEmployee = new AddEmployee();

$AddEmployee->newEmployee();

Auth::check(); 
?>
<?php require_once __DIR__ . '/app/partials/header.php'; ?>


    <div class="container main" style="max-width: 500px; margin-top: 30px">
      <h1>Add / Edit Employee</h1>
      <form action="add-employee.php" method="POST" >
        <input type="text" placeholder="Full Name" name="fullname" required />
        <input type="email" placeholder="Email" name="email" required />
        <input type="text" placeholder="phone" name="phone" required />
        <input type="text" placeholder="role" name="role" required />
        <input type="number"  step="0.01"  placeholder="Salary" name="salary" required />
        <select required name="payment-type">
          <option value="">Payment Type</option>
          <option value="monthly">Monthly</option>
          <option value="hourly">Hourly</option>
        </select>
        <button type="submit">Save</button>
      </form>
    </div>
<?php require_once __DIR__ . '/app/partials/footer.php'; ?>
 
