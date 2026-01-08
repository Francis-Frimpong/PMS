
<?php require_once __DIR__ . '/../partials/header.php'; ?>


<div class="container main">
  <div class="detail-card">
    <div class="detail-title">Employee Details</div>

    <?php if(isset($employee)):?>
        <div class="detail-grid">
          <div class="detail-item">
            <span>Full Name</span>
            <strong><?=  htmlspecialchars($employee['full_name']) ?></strong>
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
            <strong><?=  htmlspecialchars($employee['payment_type']) ?></strong>
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
      <a href="/PMS/employees" class="btn">Back</a>
      <a href="/PMS/updateEmployee?id=<?= $id?>" class="btn">Edit</a>
    </div>
  </div>
</div>



<?php require_once __DIR__ . '/../partials/footer.php'; ?>