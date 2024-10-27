<?php
class AccountModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function login($username, $password) {
        // Prepare the SQL query to fetch user details
        $sql = "SELECT id, username, password, role FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $username, $hashed_password, $role);
            $stmt->fetch();
            
            if (password_verify($password, $hashed_password)) {
                // Return user details including the role
                return [
                    "success" => true,
                    "user" => [
                        "id" => $id,
                        "username" => $username,
                        "role" => $role
                    ]
                ];
            } else {
                return ["success" => false, "message" => "Invalid password."];
            }
        } else {
            return ["success" => false, "message" => "Invalid username."];
        }
    }
}

?>