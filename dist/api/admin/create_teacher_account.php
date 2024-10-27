<?php
// create_teacher_account.php

// Include the database connection file
include_once '../../config/pdo_database.php';

// Set header to accept JSON format
header("Content-Type: application/json");

// Retrieve the raw POST data
$data = json_decode(file_get_contents("php://input"), true);

// Check if required data fields are provided
if (isset($data['firstname'], $data['middleInitial'], $data['lastname'], $data['gender'], $data['email'])) {
    $firstname = $data['firstname'];
    $middleInitial = $data['middleInitial'];
    $lastname = $data['lastname'];
    $gender = $data['gender'];
    $email = $data['email'];
    $password = "12345678";
    // $department = $data['department'];
    // $otherDetails = $data['otherDetails'];

    try {
        // Check if the email already exists
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $emailExists = $stmt->fetchColumn();

        if ($emailExists) {
            // If email exists, send a response
            echo json_encode(["success" => false, "message" => "Email already exists."]);
            return;
        }

        // Begin the transaction
        $pdo->beginTransaction();

        // Insert into users table
        $stmt = $pdo->prepare("INSERT INTO users (firstname, middle_initial, lastname, gender, email, password, role) VALUES (?, ?, ?, ?, ?, ?, 'teacher')");
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $stmt->execute([$firstname, $middleInitial, $lastname, $gender, $email, $passwordHash]);
        
        // Get the last inserted user_id
        // $userId = $pdo->lastInsertId();
        
        // // Insert into teacher_profiles table
        // $stmt = $pdo->prepare("INSERT INTO teacher_profiles (user_id, department, other_teacher_specific_info) VALUES (?, ?, ?)");
        // $stmt->execute([$userId, $department, $otherDetails]);
        
        // Commit the transaction
        $pdo->commit();
        
        // Send a success response
        echo json_encode(["success" => true, "message" => "Teacher account created successfully!"]);
        return;

    } catch (Exception $e) {
        // Rollback the transaction in case of error
        $pdo->rollBack();
        
        // Send an error response
        echo json_encode(["success" => false, "message" => "Error: " . $e->getMessage()]);
        return;
    }
} else {
    // Send a response if required data is missing
    echo json_encode(["success" => false, "message" => "Missing required fields."]);
}
?>