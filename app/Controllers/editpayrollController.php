<?php
namespace App\Controllers;

require_once "app/Database/Database.php";
require_once "app/Models/editpayrollRecords.php";
require_once "app/Core/Flash.php";

use App\Models\EditPayroll;
use App\Core\FlashMessage;
use App\Database\Database;


class UpdatePayrollData{
    private $editPayroll;
    

    public function __Construct()
    {
        $pdo = Database::getConnection();
        $this->editPayroll = new EditPayroll($pdo);
    }

   public function UpdatePayrollRecords()
{
    $id = $_GET['id'] ?? null;

    if (!$id) {
        header("Location: payroll.php");
        exit;
    }

    // 1️⃣ Get ONE payroll record
    $payroll = $this->editPayroll->getPayrollById($id);

    if (!$payroll) {
        die("Payroll record not found");
    }

    // 2️⃣ Get ALL employees (for dropdown)
    $employees = $this->editPayroll->getAllEmployees();

    // 3️⃣ Handle update
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $employee_id  = (int) $_POST['employee_id'];
        $pay_period   = trim($_POST['pay_period']);
        $gross_salary = trim($_POST['gross_salary']);
        $tax          = trim($_POST['tax']);
        $deductions   = trim($_POST['deductions']);
        $net_salary   = trim($_POST['net_salary']);
        $payment_date = trim($_POST['payment_date']);

        $this->editPayroll->updatePayrollData(
            $employee_id,
            $pay_period,
            $gross_salary,
            $tax,
            $deductions,
            $net_salary,
            $payment_date,
            $id
        );

        FlashMessage::addMessage('info', 'Employee payroll data updated');
        header("Location: payroll.php");
        exit;
    }

    // 4️⃣ Return clean data to view
    return [
        'payroll'   => $payroll,    // ONE record
        'employees' => $employees   // LIST
    ];
}

}