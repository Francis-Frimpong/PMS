<?php  
$navLinks = [
  "Dashboard" =>'dashboard.php', 
  "Employees" => "employees.php", 
  "Payroll" => "payroll.php", 
  "Reports" => "reports.php"
];

  $currentPage = basename($_SERVER['PHP_SELF']);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payroll App - <?= isset($pageTitle) ? $pageTitle : "Payroll App" ?></title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
<div class="navbar">
  <div class="nav-links">
    <?php foreach($navLinks as $navlink => $url) :?>
      <a href="<?= htmlspecialchars($url)?>" class="<?=  $currentPage === $url? 'active-page': ''?>"><?= htmlspecialchars($navlink) ?></a>
    <?php endforeach?>
   
  </div>

  <form action="logout.php" method="POST" class="logout-form">
    <button type="submit" class="logout-btn">Logout</button>
  </form>
</div>
