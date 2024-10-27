<?php
require_once '../../config/database.php';
require_once '../../models/admin/studentModel.php';

class StudentController {
    private $model;

    public function __construct() {
        $this->model = new StudentModel(getDatabaseConnection());
    }

    public function getStudents() {
       return $this->model->getAllStudents();
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