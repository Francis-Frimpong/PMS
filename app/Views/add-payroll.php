<?php require_once __DIR__ . '/../partials/header.php'; ?>


    <div class="container main" style="max-width: 500px; margin-top: 30px">
      <h1>Add Payroll Record</h1>
  <form action="/PMS/add-payroll" method="POST">
    <select name="employee_id" required>
      <option value="">Select Employee</option>
      <?php foreach($lists as $list): ?>
        <option value="<?= $list['id'] ?>"><?=  htmlspecialchars($list['full_name']) ?></option>
      <?php endforeach ?>
     
    </select>

    <label>Pay Period</label>
    <input type="text" name="pay_period" placeholder="e.g. January 20.." required />
    
    <label>Gross Salary</label>
    <input type="number" step="0.01" name="gross_salary" placeholder="Gross Salary" required />

    <label>Tax</label>
    <input type="number" step="0.01" name="tax" placeholder="Tax" required />

    <label>Deductions</label>
    <input type="number" step="0.01" name="deductions" placeholder="Deductions" required />

    <label>Net Salary</label>
    <input type="number" step="0.01" name="net_salary" placeholder="Net Salary" required />

    <label>Payment Date</label>
    <input type="date" name="payment_date" required />

    <button type="submit">Save</button>
</form>

    </div>
<?php require_once __DIR__ . '/../partials/footer.php'; ?>
 
