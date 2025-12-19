<?php
namespace App\Controllers;

require_once "app/Database/Database.php";
require_once "app/Models/editUser.php";

use App\Models\EditUser;
use App\Database\Database;

class EditUserData{
    private $editUserInfo;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->editUserInfo = new EditUser($pdo);

    }

    public function editAndUpdateUser()
{
    $id = $_GET['id'] ?? null;

    if (!$id) {
        header("Location: employees.php");
        exit;
    }

    $user = $this->editUserInfo->selectUser($id);

    if (!$user) {
        die("User not found");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fullname = trim($_POST['fullname']);
        $email = trim($_POST['email']);
        $role = trim($_POST['role']);
        $phone = trim($_POST['phone']);
        $salary = trim($_POST['salary']);
        $date_hired = trim($_POST['date_hired']);
        $payment_type = trim($_POST['payment_type']);

        $this->editUserInfo->updateUserInfo(
            $fullname,
            $email,
            $phone,
            $role,
            $payment_type,
            $date_hired,
            $salary,
            $id
        );

        header("Location: employees.php");
        exit;
    }

    return [
        'user' => $user,
        'id' => $id
    ];
}

}