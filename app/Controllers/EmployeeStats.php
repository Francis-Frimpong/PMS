<?php
namespace App\Controllers;
require_once __DIR__ . '/../Models/DashboardStats.php';
require_once __DIR__ .'/../Middleware/Auth.php';
require_once __DIR__ . '/../Database/Database.php';

use App\Middleware\Auth;
use App\Database\Database;
use App\Models\Statistics;



class EmployeeStats
{
    private $stats;
    
    public function __construct()
    {
        Auth::check(); 
        $pdo = Database::getConnection();

        $this->stats = new Statistics($pdo);
    }
    
    public function index(){
        $pageTitle = "Dashboard";

        $stats = $this->getStats();

        require __DIR__ .'/../Views/dashboard.php';
    }

    public function getStats(): array
    {
        return $this->stats->dashboardStats();
    }
}
