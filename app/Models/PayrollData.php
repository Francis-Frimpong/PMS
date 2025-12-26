<?php
namespace App\Models;

USE PDO;

class Payroll{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addPayroll($employee_id, $pay_period, $gross_salary, $tax, $deductions, $net_salary, $payment_date){
        $stmt = $this->pdo->prepare("INSERT INTO payroll( employee_id, pay_period, gross_salary, tax, deductions, net_salary, payment_date) VALUES (?,?,?,?,?,?,?)");

        $stmt->execute([$employee_id, $pay_period, $gross_salary, $tax, $deductions, $net_salary, $payment_date]);

        return $stmt;
    }
}