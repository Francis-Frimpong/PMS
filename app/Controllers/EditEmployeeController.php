<?php
namespace App\Controllers;

require_once "app/Database/Database.php";
require_once "app/Models/editUser.php";
require_once "app/Core/Flash.php";
require_once 'app/Middleware/Auth.php';

use App\Middleware\Auth;


use App\Models\EditUser;
use App\Core\FlashMessage;
use App\Database\Database;

class EditEmployeeController{
    private $editUserInfo;

    public function __construct()
    {
        $pdo = Database::getConnection();
        $this->editUserInfo = new EditUser($pdo);

    }

    public function showUpdatePage(){
        Auth::check();
        $flashMessage = FlashMessage::getMessage();

        $pageTitle = "Edit Employee";

        $editData = $this->editAndUpdateEmployee();

        $id = $editData['id'];
        $employee = $editData['employee'];

        require __DIR__.'/../Views/updateEmployee.php';
    }

    public function editAndUpdateEmployee()
    {
    $id = $_GET['id'] ?? null;

    if (!$id) {
        header("Location: employees.php");
        exit;
    }

    $employee = $this->editUserInfo->selectUser($id);

    if (!$employee) {
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

        

        FlashMessage::addMessage('info', 'Employee Info updated');
        header("Location: /PMS/employees");
        exit;

    }

    return [
        'employee' => $employee,
        'id' => $id
    ];
}

}