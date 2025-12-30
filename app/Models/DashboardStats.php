<?php
namespace App\Models;

use PDO;

class Statistics{
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }

    public function dashboardStats() :array{
      $stmt = $this->pdo->prepare("SELECT COUNT(full_name) AS total_employees, COALESCE(SUM(salary), 0) AS total_salary FROM employees");
      $stmt->execute();

      $dashboardStats = $stmt->fetch(PDO::FETCH_ASSOC);



        return $dashboardStats;

    }
}