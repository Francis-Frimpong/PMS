<?php
namespace App\Models;

USE PDO;


class Employee{
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

    public function createEmployee($fullname, $email, $phone, $role, $salary_payment_type, $date_hired, $salary){
        $stmt = $this->pdo->prepare("INSERT INTO employees (fullname, email,phone, role, salary_payment_type, date_hired, salary) VALUES(?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$fullname, $email, $phone, $role, $salary_payment_type, $date_hired, $salary]);
        return $stmt;
    }

    public function displayEmployees(){
        // pagination query
        $this->perPage = 5;
        $stmt = $this->pdo->query("SELECT COUNT(*) AS cnt FROM employees");
        $this->totalRows = (int)$stmt->fetchColumn();
        $this->totalPages = ($this->totalRows > 0) ? (int) ceil($this->totalRows / $this->perPage) : 1;

        $this->page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        if ($this->page < 1) $this->page = 1;
        if ($this->page > $this->totalPages) $this->page = $this->totalPages;

        $offset = ($this->page - 1) * $this->perPage;

        // query for employee list
        $stmt = $this->pdo->prepare("SELECT id,fullname, role, salary FROM employees ORDER BY id DESC LIMIT :offset, :perPage");
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

    public function deleteEmployee($id){
        $stmt = $this->pdo->prepare("DELETE FROM employees WHERE id = ?");
        return $stmt->execute([$id]);
    }
}