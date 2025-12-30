<?php
require_once 'app/Middleware/Auth.php';
require_once 'app/Controllers/editUserController.php';

use App\Middleware\Auth;
use App\Controllers\EditUserData;

Auth::check();

$editEmployee = new EditUserData();
$editData = $editEmployee->editAndUpdateUser();

$id = $editData['id'];
$user = $editData['user'];

$pageTitle = "Edit Employee";
?>
<?php require_once __DIR__ . '/app/partials/header.php'; ?>

<div class="container main" style="max-width: 500px; margin-top: 30px">
  <h1>Edit Employee</h1>

  <form action="updateEmployee.php?id=<?= $id ?>" method="POST">
    <input type="text" name="fullname" value="<?= htmlspecialchars($user['full_name']) ?>" required>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
    <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required>
    <input type="text" name="role" value="<?= htmlspecialchars($user['role']) ?>" required>
    <input type="number" step="0.01" name="salary" value="<?= htmlspecialchars($user['salary']) ?>" required>

    <input
      type="date"
      name="date_hired"
      value="<?= htmlspecialchars($user['date_hired']) ?>"
      required
    >

    <select name="payment_type" required>
      <option value="monthly" <?= $user['payment_type'] === 'monthly' ? 'selected' : '' ?>>Monthly</option>
      <option value="hourly" <?= $user['payment_type'] === 'hourly' ? 'selected' : '' ?>>Hourly</option>
    </select>

    <button type="submit">Save</button>
  </form>
</div>

<?php require_once __DIR__ . '/app/partials/footer.php'; ?>
