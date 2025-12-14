<?php
require_once 'app/Middleware/Auth.php';

use App\Middleware\Auth;

Auth::check(); 
?>
<?php require_once __DIR__ . '/app/partials/header.php'; ?>


    <div class="container main" style="max-width: 500px; margin-top: 30px">
      <h1>Add Payroll Record</h1>
      <form>
        <select required>
          <option value="">Select Employee</option>
          <option value="john">John Doe</option>
          <option value="jane">Jane Smith</option>
        </select>
        <input type="number" placeholder="Amount" required />
        <input type="date" required />
        <button type="submit">Save</button>
      </form>
    </div>
<?php require_once __DIR__ . '/app/partials/footer.php'; ?>
 
