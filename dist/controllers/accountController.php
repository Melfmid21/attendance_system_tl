<?php
require_once '../config/database.php';
require_once '../models/accountModel.php';

class AccountController {
    private $model;

    public function __construct() {
        $this->model = new AccountModel(getDatabaseConnection());
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = isset($_POST['username']) ? $_POST['username'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            if (empty($username) || empty($password)) {
                return ["success" => false, "message" => "All fields are required."];
            }

            // Attempt to authenticate user
            $result = $this->model->login($username, $password);

            if ($result['success']) {
                // Start session if not already started
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                // // Store user information in session variables
                $_SESSION['user_id'] = $result['user']['id'];
                $_SESSION['username'] = $result['user']['username'];
                $_SESSION['role'] = $result['user']['role'];
            
                //return ["success" => true, "message" => "Login successful."];
                return ["success" => true, "message" => "Login successful.",  "user" => [
                    'role' => $result['user']['role']
                ]];
                if ($result['user']['role'] == 'admin'){
                    header('Location: ./pages/admin/ad_dashboard.php?login=success');
                    exit;
                }
            } else {
                return ["success" => false, "message" => "Invalid username or password."];
            }
        }
        return ["success" => false, "message" => "Invalid request method."];
    } //end of login

    public function logout() {
        // Start session if not already started
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Unset all session variables
        $_SESSION = [];

        // Destroy the session
        session_destroy();

        // Redirect to login page or any other desired page after logout
        header('Location: ../index.php');
        exit();
    }//end of logout
}
?>