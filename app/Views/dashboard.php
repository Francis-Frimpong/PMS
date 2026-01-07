<?php require_once __DIR__ . '/../partials/header.php'; ?>

    <div class="container main">
      <h1>Dashboard</h1>
      <div class="flex-row" style="gap: 20px; flex-wrap: wrap">
        <div
          style="
            flex: 1;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
          "
        >
          <h3>Total Employees</h3>
          <p><?php echo $stats['total_employees'];?></p>
        </div>
        <div
          style="
            flex: 1;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
          "
        >
          <h3>Total Payroll</h3>
          <p> ₵<?php echo $stats['total_salary']?></p>
        </div>
      </div>
    </div>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>

 
