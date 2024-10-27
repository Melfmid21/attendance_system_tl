<?php
require_once '../../config/database.php';
require_once '../../models/admin/accountModel.php';

class AccountController {
    private $model;

    public function __construct() {
        $this->model = new AccountModel(getDatabaseConnection());
    }

    public function createAccount() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $question1 = isset($_POST['question1']) ? $_POST['question1'] : '';
            $question2 = isset($_POST['question2']) ? $_POST['question2'] : '';

            if (empty($name) || empty($username) || empty($password) || empty($question1) || empty($question2)) {
                return ["success" => false, "message" => "All fields are required."];
            }

            return $this->model->createAccount($name, $username, $password, $question1, $question2);
        }
        return ["success" => false, "message" => "Invalid request method."];
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            if (empty($username) || empty($password)) {
                return ["success" => false, "message" => "All fields are required."];
            }

            return $this->model->login($username, $password);
        }
        return ["success" => false, "message" => "Invalid request method."];
    }
}
?>