<?php
namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

require_once 'app/Middleware/Auth.php';
require_once "app/Database/Database.php";
require_once "app/Models/PayrollData.php";
require_once "app/Models/Employee.php";
require_once "app/Core/Flash.php";

use App\Middleware\Auth;
use App\Models\Payroll;
use App\Models\Employee;
use App\Core\FlashMessage;
use App\Database\Database;
use Dompdf\Dompdf;

class PayrollRecordController{
    private $addPayroll;
    private $employeeList;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->addPayroll = new Payroll($pdo);
        $this->employeeList = new Employee($pdo);
    }

    public function payrollPage(){
        Auth::check(); 
        $flashMessage = FlashMessage::getMessage();


        $pageTitle = "Payroll";
        $payrollData = $this->showPayrollList();

        $payrollLists = $payrollData['list'];
        $page = $payrollData['page'];
        $totalPages = $payrollData['totalPages'];


        require __DIR__ .'/../Views/payroll.php';
    }

    public function addPayrollpage(){
        Auth::check(); 

        $employeeId = $this->employeeList->displayEmployees();

        $lists = $employeeId['list'];

        $pageTitle = "Add Payroll Records";
        require __DIR__ .'/../Views/add-payroll.php';


    }

    public function newPayrollRecord(){
        if($_SERVER["REQUEST_METHOD"] === 'POST'){
            $employee_id = (int) $_POST['employee_id'];
            $pay_period = trim($_POST['pay_period']);
            $gross_salary = trim($_POST['gross_salary']);
            $tax = trim($_POST['tax']);
            $deductions = trim($_POST['deductions']); 
            $net_salary = trim($_POST['net_salary']); 
            $payment_date = trim($_POST['payment_date']);

            if(empty($employee_id) || empty($pay_period) || empty($gross_salary) || empty($tax) || empty($deductions) || empty($net_salary) || empty($payment_date) ){
                header('Location: add-payroll.php');
                exit;        
            }

            $this->addPayroll->addPayroll($employee_id, $pay_period, $gross_salary, $tax, $deductions, $net_salary, $payment_date);

            FlashMessage::addMessage('success', 'Payroll added');
            header('Location: /PMS/payroll');
            exit;
        }
    }

    public function showPayrollList(){
        $payrollData = $this->addPayroll->showPayroll();

        return[
            'list' => $payrollData['list'],
            'page' => $payrollData['page'],
            'totalPages' => $payrollData['totalPages'],
        ];
    }


   public function downloadPayslip()
    {
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            header('Location: payroll.php');
            exit;
        }

        // Get POST data
        $employee_id = (int) $_POST['employee_id'];
        $monthInput = $_POST['month'];
        $month = date("F Y", strtotime($monthInput)); // converts "2026-01" → "January 2026"

        // Fetch payroll for this employee and month
        $payroll = $this->addPayroll->getPayrollByEmployeeAndMonth($employee_id, $month);
        


        if(!$payroll){
            die('Payroll record not found for this employee and month');
        }

        // Start output buffering and include payslip template
        ob_start();
        require 'payslip.php';
        $html = ob_get_clean();

        // Initialize Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Stream PDF to browser
        $dompdf->stream(
            'payslip_' . $payroll['pay_period'] . '.pdf',
            ['Attachment' => true]
        );
        exit; // stop further execution
    }



    public function deletepayroll($id){
        if($id){
            $this->addPayroll->deletePayrollData($id);
            FlashMessage::addMessage('warning', 'Payroll data deleted');
            header('Location: payroll.php');
            exit;

        }
    }
}




// use App\Controllers\AddEmployee;
// use App\Controllers\AddPayrollRecords;
// use App\Core\FlashMessage;

// use App\Middleware\Auth;

// Auth::check(); 

// $employeeList = new AddEmployee();
// $addpayroll = new AddPayrollRecords;

// $addpayroll->newPayrollRecord();

// $data = $employeeList->showEmployeeList();
// $lists = $data['list'];
// // $page = $data['page'];
// // $totalPages = $data['totalPages'];

// $pageTitle = "Add Payroll Records"
