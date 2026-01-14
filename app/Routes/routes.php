<?php
return array_merge(
    require __DIR__ .'/authRoutes.php',
    require __DIR__ .'/dashboardRoutes.php',
    require __DIR__ .'/employeeRoutes.php',
    require __DIR__ .'/add-employeeRoutes.php',
    require __DIR__ .'/employeeDetailRoutes.php',
    require __DIR__ .'/employeeEditRoutes.php',
    require __DIR__ .'/payrollRoutes.php',
    require __DIR__ .'/add-payrollRoutes.php',
    require __DIR__ .'/payrollEditRoutes.php',
    require __DIR__ .'/reportsRoutes.php',
);