<?php
return array_merge(
    require __DIR__ .'/authRoutes.php',
    require __DIR__ .'/dashboardRoutes.php',
    require __DIR__ .'/employeeRoutes.php',
    require __DIR__ .'/add-employeeRoutes.php',
);