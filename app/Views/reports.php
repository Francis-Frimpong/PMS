<?php require_once __DIR__ . '/../partials/header.php'; ?>

    <div class="container main">
      <h1>Reports</h1>
      <form action="/PMS/reports" method="POST"
        style="margin-bottom: 20px; display: flex; gap: 10px; flex-wrap: wrap"
      >
        <select name="employee_id" required>
          <option value="">Select Employee</option>
          <?php foreach ($lists as $list): ?>
            <option value="<?= $list['id'] ?>">
              <?= htmlspecialchars($list['full_name']) ?>
            </option>
          <?php endforeach ?>
        </select>

        <input type="month" name="month" required />

        <button type="submit" class="btn">Generate Payroll</button>
      </form>


    </div>
<?php require_once __DIR__ . '/../partials/footer.php'; ?>
  
