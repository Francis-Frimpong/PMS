<?php
namespace App\Models;

USE PDO;

class EditUser{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectUser($id){
        $stmt = $this->pdo->prepare("SELECT * FROM employees WHERE id = ?");
        $stmt->execute([$id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user;
    }

    public function updateUserInfo($fullname, $email, $phone, $role, $payment_type, $date_hired,$salary, $id){
        $stmt = $this->pdo->prepare("UPDATE employees SET fullname = ?, email = ?, phone = ?,role = ?, salary_payment_type = ?,  date_hired = ?, salary = ? WHERE id = ?");
        $stmt->execute([ $fullname, $email, $phone, $role, $payment_type, $date_hired,$salary, $id]);

        return $stmt;

    }
}