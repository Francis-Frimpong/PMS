<?php
require_once 'app/Middleware/Auth.php';

use App\Middleware\Auth;

Auth::check(); 
?>
<?php require_once __DIR__ . '/app/partials/header.php'; ?>


    <div class="container main" style="max-width: 500px; margin-top: 30px">
      <h1>Add / Edit Employee</h1>
      <form>
        <input type="text" placeholder="Full Name" required />
        <input type="email" placeholder="Email" required />
        <input type="text" placeholder="phone" required />
        <input type="text" placeholder="role" required />
        <input type="number" placeholder="Salary" required />
        <select required>
          <option value="">Payment Type</option>
          <option value="monthly">Monthly</option>
          <option value="hourly">Hourly</option>
        </select>
        <button type="submit">Save</button>
      </form>
    </div>
<?php require_once __DIR__ . '/app/partials/footer.php'; ?>
 
