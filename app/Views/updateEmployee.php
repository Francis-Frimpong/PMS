<?php require_once __DIR__ . '/../partials/header.php'; ?>

<div class="container main" style="max-width: 500px; margin-top: 30px">
  <h1>Edit Employee</h1>

  <form action="/PMS/updateEmployee?id=<?= $id ?>" method="POST">
    <input type="text" name="fullname" value="<?= htmlspecialchars($employee['full_name']) ?>" required>
    <input type="email" name="email" value="<?= htmlspecialchars($employee['email']) ?>" required>
    <input type="text" name="phone" value="<?= htmlspecialchars($employee['phone']) ?>" required>
    <input type="text" name="role" value="<?= htmlspecialchars($employee['role']) ?>" required>
    <input type="number" step="0.01" name="salary" value="<?= htmlspecialchars($employee['salary']) ?>" required>

    <input
      type="date"
      name="date_hired"
      value="<?= htmlspecialchars($employee['date_hired']) ?>"
      required
    >

    <select name="payment_type" required>
      <option value="monthly" <?= $employee['payment_type'] === 'monthly' ? 'selected' : '' ?>>Monthly</option>
      <option value="hourly" <?= $employee['payment_type'] === 'hourly' ? 'selected' : '' ?>>Hourly</option>
    </select>

    <button type="submit">Save</button>
  </form>
</div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
