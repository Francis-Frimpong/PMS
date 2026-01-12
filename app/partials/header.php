<?php  
$navLinks = [
  "Dashboard" =>'/PMS/dashboard', 
  "Employees" => "/PMS/employees", 
  "Payroll" => "/PMS/payroll", 
  "Reports" => "reports.php"
];

  $currentUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

  // strip base path
  $basePath = '/PMS';
  if (strpos($currentUri, $basePath) === 0) {
      $currentUri = substr($currentUri, strlen($basePath));
  }
  if ($currentUri === '') {
      $currentUri = '/';
  }

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
    <?php foreach($navLinks as $label => $url): 
        $linkPath = parse_url($url, PHP_URL_PATH);
        $linkPath = str_replace($basePath, '', $linkPath);
    ?>
      <a href="<?= htmlspecialchars($url) ?>"
         class="<?= $currentUri === $linkPath ? 'active-page' : '' ?>">
         <?= htmlspecialchars($label) ?>
      </a>
    <?php endforeach ?>
  </div>

  <form action="/PMS/logout" method="POST" class="logout-form">
    <button type="submit" class="logout-btn">Logout</button>
  </form>
</div>
