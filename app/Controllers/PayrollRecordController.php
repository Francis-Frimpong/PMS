<?php
namespace App\Controllers;

require_once __DIR__ . '/../../vendor/autoload.php';

require_once "app/Database/Database.php";
require_once "app/Models/PayrollData.php";
require_once "app/Core/Flash.php";

use App\Models\Payroll;
use App\Core\FlashMessage;
use App\Database\Database;
use Dompdf\Dompdf;

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
            FlashMessage::addMessage('success', 'Payroll data deleted');
            header('Location: payroll.php');
            exit;

        }
    }
}