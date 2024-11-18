<?php
// update_student.php

// Include the database connection file
include_once '../../config/pdo_database.php';

// Set header to accept JSON format
header("Content-Type: application/json");

// Retrieve the raw PUT data
$data = json_decode(file_get_contents("php://input"), true);

// Check if required data fields are provided
if (
    isset(
        $data['id'],
        $data['firstname'],
        $data['middle_name'],
        $data['lastname'],
        $data['gender'],
        $data['dob'],
        $data['email'],
        $data['contact_number'],
        $data['address'],
        $data['guardian_name'],
        $data['relationship'],
        $data['guardian_contact_number'],
        $data['guardian_address'],
        $data['course'],
        $data['year_level'],
        $data['fingerprint_id']
    )
) {
    // Extract data fields
    $id = $data['id'];
    $firstname = $data['firstname'];
    $middleName = $data['middle_name'];
    $lastname = $data['lastname'];
    $gender = $data['gender'];
    $dob = $data['dob'];
    $email = $data['email'];
    $contactNumber = $data['contact_number'];
    $address = $data['address'];
    $guardianName = $data['guardian_name'];
    $relationship = $data['relationship'];
    $guardianContact = $data['guardian_contact_number'];
    $guardianAddress = $data['guardian_address'];
    $course = $data['course'];
    $yearLevel = $data['year_level'];
    $fingerprintId = $data['fingerprint_id'];

    try {
        // Begin the transaction
        $pdo->beginTransaction();

        // Check if the email is being updated to one that already exists for another student
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM students WHERE email = ? AND id != ?");
        $stmt->execute([$email, $id]);
        $emailExists = $stmt->fetchColumn();

        if ($emailExists) {
            // If email exists, send a response
            echo json_encode(["success" => false, "message" => "Email already exists for another student."]);
            return;
        }

        // Update the student's information
        $stmt = $pdo->prepare("
            UPDATE students 
            SET 
                firstname = ?, 
                middle_name = ?, 
                lastname = ?, 
                gender = ?, 
                dob = ?, 
                email = ?, 
                contact_number = ?, 
                address = ?, 
                guardian_name = ?, 
                relationship = ?, 
                guardian_contact_number = ?, 
                guardian_address = ?, 
                course = ?, 
                year_level = ?, 
                fingerprint_id = ? 
            WHERE id = ?
        ");
        $stmt->execute([
            $firstname,
            $middleName,
            $lastname,
            $gender,
            $dob,
            $email,
            $contactNumber,
            $address,
            $guardianName,
            $relationship,
            $guardianContact,
            $guardianAddress,
            $course,
            $yearLevel,
            $fingerprintId,
            $id
        ]);

        // Commit the transaction
        $pdo->commit();

        // Send a success response
        echo json_encode(["success" => true, "message" => "Student information updated successfully!"]);
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