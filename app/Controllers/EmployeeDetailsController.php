<?php
namespace app\Controllers;

require_once 'app/Middleware/Auth.php';
require_once 'app/Database/Database.php';
require_once 'app/Models/editUser.php';

use App\Middleware\Auth;
use App\Models\EditUser;
use App\Database\Database;


class EmployeeDetailsController{
    private $employeeDetail;
    
    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->employeeDetail = new EditUser($pdo);
        
    }
    
    public function employeeDetailPage(){
        Auth::check(); 
        $pageTitle = 'Employee Detail';

        $employee = $this->showEmployeeData();
        $id = $employee['id'];

        require __DIR__ .'/../Views/employee-detail.php';

    }

    public function showEmployeeData(){

        $id = $_GET['id'] ?? null;
        
        if (!$id) {
            die("No employee selected");
        }
        
        $employee = $this->employeeDetail->selectUser($id);
        
        if (!$employee) {
            die("Employee not found");
        }

        return $employee;
    }
}





