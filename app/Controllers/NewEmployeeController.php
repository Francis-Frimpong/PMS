<?php
namespace App\Controllers;


require_once "app/Database/Database.php";
require_once "app/Models/Employee.php";
require_once "app/Core/Flash.php";

use App\Models\Employee;
use App\Core\FlashMessage;

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

            FlashMessage::addMessage('success', 'New employee added');
            header('Location: employees.php');
            exit;

        }
    }

    public function showEmployeeList(){
        return $this->addEmployee->displayEmployees();
    }

    public function delete($id){
        if ($id) {
            $this->addEmployee->deleteEmployee($id);
            FlashMessage::addMessage('success', 'Employee info deleted');
            header('Location: employees.php');
            exit;
        }
    }

    
}