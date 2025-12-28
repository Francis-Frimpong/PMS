<?php
namespace App\Models;

USE PDO;

class Payroll{
    private $pdo;

    public $page;
    public $perPage;
    public $totalRows;
    public $totalPages;
    public $id;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addPayroll($employee_id, $pay_period, $gross_salary, $tax, $deductions, $net_salary, $payment_date){
        $stmt = $this->pdo->prepare("INSERT INTO payroll( employee_id, pay_period, gross_salary, tax, deductions, net_salary, payment_date) VALUES (?,?,?,?,?,?,?)");

        $stmt->execute([$employee_id, $pay_period, $gross_salary, $tax, $deductions, $net_salary, $payment_date]);

        return $stmt;
    }

    public function showPayroll(){
         // pagination query
        $this->perPage = 5;
        $stmt = $this->pdo->query("SELECT COUNT(*) AS cnt FROM payroll");
        $this->totalRows = (int)$stmt->fetchColumn();
        $this->totalPages = ($this->totalRows > 0) ? (int) ceil($this->totalRows / $this->perPage) : 1;

        $this->page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        if ($this->page < 1) $this->page = 1;
        if ($this->page > $this->totalPages) $this->page = $this->totalPages;

        $offset = ($this->page - 1) * $this->perPage;

        // query for employee list

            $stmt = $this->pdo->prepare("SELECT 
            payroll.id AS payroll_id,
            payroll.payment_date,
            payroll.net_salary,
            employees.fullname AS employee_name
            FROM payroll
            JOIN employees ON payroll.employee_id = employees.id
            ORDER BY payroll.id DESC
            LIMIT :offset, :perPage
        ");
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':perPage', $this->perPage, PDO::PARAM_INT);
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return [
            "list" => $list,
            'page' => $this->page,
            'totalPages' => $this->totalPages,
            
        ];

    }
}