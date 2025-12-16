<?php
namespace App\Controllers;

require_once "app/Database/Database.php";
require_once "app/Models/Create-employee.php";

use App\Models\Employee;
use App\Database\Database;

class AddEmployee{
    private $addEmployee;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->addEmployee = new Employee($pdo);
    }

    public function newEmployee(){
        if($_SERVER["REQUEST_METHOD"] === 'POST'){
            $fullname = trim($_POST['fullname']);
            $email = trim($_POST['email']);
            $role = trim($_POST['role']);
            $phone = trim($_POST['phone']);
            $salary = trim($_POST['salary']);
            $date_hired = trim($_POST['date_hired']);
            $payment_type = trim($_POST['payment-type']);

            if(empty($fullname) || empty($email) || empty($role) || empty($phone) || empty($salary) || empty($date_hired) || empty($payment_type)){
                header('Location: add-employee.php');
                exit;
            }

            $this->addEmployee->createEmployee($fullname, $email, $phone, $role, $payment_type, $date_hired,$salary);

            header('Location: employees.php');

        }
    }

    public function showEmployeeList(){
        return $this->addEmployee->displayEmployees();
    }
}