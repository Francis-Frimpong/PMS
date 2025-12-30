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
        $stmt = $this->pdo->prepare("INSERT INTO payrolls( employee_id, pay_period, gross_salary, tax, deductions, net_salary, payment_date) VALUES (?,?,?,?,?,?,?)");

        $stmt->execute([$employee_id, $pay_period, $gross_salary, $tax, $deductions, $net_salary, $payment_date]);

        return $stmt;
    }

    public function showPayroll(){
         // pagination query
        $this->perPage = 5;
        $stmt = $this->pdo->query("SELECT COUNT(*) AS cnt FROM payrolls");
        $this->totalRows = (int)$stmt->fetchColumn();
        $this->totalPages = ($this->totalRows > 0) ? (int) ceil($this->totalRows / $this->perPage) : 1;

        $this->page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        if ($this->page < 1) $this->page = 1;
        if ($this->page > $this->totalPages) $this->page = $this->totalPages;

        $offset = ($this->page - 1) * $this->perPage;

        // query for employee list

            $stmt = $this->pdo->prepare("SELECT 
            payrolls.id AS payroll_id,
            payrolls.payment_date,
            payrolls.net_salary,
            employees.full_name AS employee_name
            FROM payrolls
            JOIN employees ON payrolls.employee_id = employees.id
            ORDER BY payrolls.id DESC
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