<?php
// update_teacher.php

// Include the database connection file
include_once '../../config/pdo_database.php';

// Set header to accept JSON format
header("Content-Type: application/json");

// Retrieve the raw PUT data
$data = json_decode(file_get_contents("php://input"), true);

// Check if required data fields are provided
if (isset($data['id'], $data['firstname'], $data['middle_initial'], $data['lastname'], $data['gender'], $data['email'])) {
    $id = $data['id'];
    $firstname = $data['firstname'];
    $middleInitial = $data['middle_initial'];
    $lastname = $data['lastname'];
    $gender = $data['gender'];
    $email = $data['email'];

    try {
        // Begin the transaction
        $pdo->beginTransaction();

        // Check if the email is being updated to one that already exists for another user
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ? AND id != ?");
        $stmt->execute([$email, $id]);
        $emailExists = $stmt->fetchColumn();

        if ($emailExists) {
            // If email exists, send a response
            echo json_encode(["success" => false, "message" => "Email already exists for another user."]);
            return;
        }

        // Update the teacher's information
        $stmt = $pdo->prepare("UPDATE users SET firstname = ?, middle_initial = ?, lastname = ?, gender = ?, email = ? WHERE id = ?");
        $stmt->execute([$firstname, $middleInitial, $lastname, $gender, $email, $id]);

        // Commit the transaction
        $pdo->commit();
        
        // Send a success response
        echo json_encode(["success" => true, "message" => "Teacher information updated successfully!"]);
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