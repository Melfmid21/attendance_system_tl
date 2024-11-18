<?php
// update_teacher_status.php

// Include the database connection file
include_once '../../config/pdo_database.php';

// Set header to accept JSON format
header("Content-Type: application/json");

// Retrieve the raw POST data
$data = json_decode(file_get_contents("php://input"), true);

// Check if the required data field is provided
if (isset($data['id'])) {
    $userId = $data['id'];

    try {
        // Begin the transaction
        $pdo->beginTransaction();

        // Update the student's status to inactive
        $stmt = $pdo->prepare("UPDATE students SET isDeleted = 1 WHERE id = ?");
        $stmt->execute([$userId]);

        // Commit the transaction
        $pdo->commit();

        // Send a success response
        echo json_encode(["success" => true, "message" => "Deleted successfully!"]);
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