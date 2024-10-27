<?php
class AccountModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function createAccount($name, $username, $password, $question1, $question2) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("INSERT INTO admin (name, username, password, question1, question2) VALUES (?, ?, ?, ?, ?)");
        if ($stmt === false) {
            return ["success" => false, "message" => "Prepare failed: " . $this->db->error];
        }

        $stmt->bind_param("sssss", $name, $username, $hashed_password, $question1, $question2);
        if ($stmt->execute()) {
            return ["success" => true];
        } else {
            return ["success" => false, "message" => "Execute failed: " . $stmt->error];
        }
    }

    public function login($username, $password) {
        $stmt = $this->db->prepare("SELECT password FROM admin WHERE username = ?");
        if ($stmt === false) {
            return ["success" => false, "message" => "Prepare failed: " . $this->db->error];
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashed_password);
            $stmt->fetch();
            if (password_verify($password, $hashed_password)) {
                return ["success" => true];
            } else {
                return ["success" => false, "message" => "Invalid password."];
            }
        } else {
            return ["success" => false, "message" => "Username not found."];
        }
    }
}
?>