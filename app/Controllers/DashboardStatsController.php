<?php
namespace App\Controllers;
require_once 'app/Models/DashboardStats.php';

use App\Database\Database;
use App\Models\Statistics;

class EmployeeStats
{
    private $stats;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->stats = new Statistics($pdo);
    }

    public function getStats(): array
    {
        return $this->stats->dashboardStats();
    }
}
