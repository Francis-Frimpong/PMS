<?php
namespace App\Models;

USE PDO;


class Employee{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function createEmployee($fullname, $email, $phone, $role, $salary_payment_type, $salary){
        $stmt = $this->pdo->prepare("INSERT INTO employees (fullname, email,phone, role, salary_payment_type, salary) VALUES(?, ?, ?, ?, ?, ?)");
        $stmt->execute([$fullname, $email, $phone, $role, $salary_payment_type, $salary]);
        return $stmt;
    }

    public function displayEmployee(){
        $stmt = $this->pdo->prepare("SELECT fullname, role, salary FROM employees");
        $stmt->execute();
        $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $stmt;

    }
}