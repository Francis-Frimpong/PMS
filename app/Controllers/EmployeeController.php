<?php
namespace App\Controllers;


require_once "app/Database/Database.php";
require_once "app/Models/Employee.php";
require_once "app/Core/Flash.php";
require_once 'app/Middleware/Auth.php';



use App\Middleware\Auth;
use App\Core\FlashMessage;
use App\Models\Employee;
use App\Database\Database;

class EmployeeController{
    private $addEmployee;
    
    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->addEmployee = new Employee($pdo);
    }
    
    public function employeePage(){
         Auth::check(); 

        $flashMessage = FlashMessage::getMessage();
        $pageTitle = "Employee";

        $data = $this->showEmployeeList();

        $lists = $data['lists'];
        $page = $data['page'];
        $totalPages = $data['totalPages'];

        require __DIR__ .'/../Views/employees.php';
    }
    
    public function addEmployeePage(){
        Auth::check(); 
        $pageTitle = "Add Employee";

        require __DIR__ .'/../Views/add-employee.php';
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
                header('Location: /PMS/add-employee');
                exit;
            }

            $this->addEmployee->createEmployee($fullname, $email, $phone, $role, $payment_type, $date_hired,$salary);

            FlashMessage::addMessage('success', 'New employee added');
            header('Location: /PMS/employees');
            exit;

        }
    }

    public function showEmployeeList(){
        $data = $this->addEmployee->displayEmployees();
       
        return [
            'lists' => $data['list'],
            'page' => $data['page'],
            'totalPages' => $data['totalPages']
        ];
    }

    public function delete($id){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            if ($id) {
                $this->addEmployee->deleteEmployee($id);
                FlashMessage::addMessage('success', 'Employee info deleted');
                header('Location: employees.php');
                exit;
            }
        }
    }

    
}