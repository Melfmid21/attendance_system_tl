<?php
class StudentModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getAllStudents() {
        $sql = "SELECT id, firstname, lastname FROM students";
        $result = $this->db->query($sql);
        $students = [];
        
        while ($row = $result -> fetch_assoc()){
            $students[] = $row;
        }
        return $students;
    }//end of getAllStudents

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