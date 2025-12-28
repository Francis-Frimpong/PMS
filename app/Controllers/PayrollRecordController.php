<?php
namespace App\Controllers;

require_once "app/Database/Database.php";
require_once "app/Models/PayrollData.php";
require_once "app/Core/Flash.php";

use App\Models\Payroll;
use App\Core\FlashMessage;
use App\Database\Database;

class AddPayrollRecords{
    private $addPayroll;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->addPayroll = new Payroll($pdo);
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
            header('Location: payroll.php');
            exit;
        }
    }

    public function showPayrollList(){
        return $this->addPayroll->showPayroll();
    }
}