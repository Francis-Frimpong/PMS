<?php
namespace App\Models;

USE PDO;


class Employee{
    private $pdo;

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
        $stmt = $this->pdo->prepare("SELECT fullname, role, salary FROM employees");
        $stmt->execute();
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return [
            "list" => $list
        ];

    }
}