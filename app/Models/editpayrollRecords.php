<?php
namespace App\Models;

use PDO;

class EditPayroll
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // 1️⃣ Get ONE payroll record
    public function getPayrollById($id)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM payrolls WHERE id = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 2️⃣ Get ALL employees (for dropdown)
    public function getAllEmployees()
    {
        $stmt = $this->pdo->query(
            "SELECT id, full_name FROM employees ORDER BY full_name"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 3️⃣ Update payroll record
    public function updatePayrollData(
        $employee_id,
        $pay_period,
        $gross_salary,
        $tax,
        $deductions,
        $net_salary,
        $payment_date,
        $id
    ) {
        $stmt = $this->pdo->prepare(
            "UPDATE payrolls 
             SET employee_id = ?, pay_period = ?, gross_salary = ?, tax = ?, deductions = ?, net_salary = ?, payment_date = ?
             WHERE id = ?"
        );

        return $stmt->execute([
            $employee_id,
            $pay_period,
            $gross_salary,
            $tax,
            $deductions,
            $net_salary,
            $payment_date,
            $id
        ]);
    }
}
