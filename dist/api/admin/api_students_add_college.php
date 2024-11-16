<?php
header('Content-Type: application/json');
// Include the database connection file
include_once '../../config/pdo_database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capture the JSON data sent via fetch
    $input = json_decode(file_get_contents('php://input'), true);

    // Validate required fields
    $requiredFields = [
        'firstname', 'middle_name', 'lastname', 'gender', 'dob', 'email', 'address', 'contact_number',
        'guardian_name', 'relationship', 'guardian_contact', 'guardian_address',
        'course', 'year_level', 'fingerprint_id'
    ];

    foreach ($requiredFields as $field) {
        if (empty($input[$field])) {
            echo json_encode(['status' => 'error', 'message' => "Field $field is required."]);
            http_response_code(400);
            exit;
        }
    }

    try {
        // Prepare the SQL statement
        $stmt = $pdo->prepare(
            'INSERT INTO students (
                firstname, middle_name, lastname, gender, dob, email, address, contact_number,
                guardian_name, relationship, guardian_contact_number, guardian_address,
                course, year_level, fingerprint_id
            ) VALUES (
                :firstname, :middle_name, :lastname, :gender, :dob, :email, :address, :contact_number,
                :guardian_name, :relationship, :guardian_contact, :guardian_address,
                :course, :year_level, :fingerprint_id
            )'
        );

        // Execute the statement with the input values
        $stmt->execute([
            ':firstname' => $input['firstname'],
            ':middle_name' => $input['middle_name'] ?? null,
            ':lastname' => $input['lastname'],
            ':gender' => $input['gender'],
            ':dob' => $input['dob'],
            ':email' => $input['email'],
            ':address' => $input['address'],
            ':contact_number' => $input['contact_number'],
            ':guardian_name' => $input['guardian_name'],
            ':relationship' => $input['relationship'],
            ':guardian_contact' => $input['guardian_contact'],
            ':guardian_address' => $input['guardian_address'],
            ':course' => $input['course'],
            ':year_level' => $input['year_level'],
            ':fingerprint_id' => $input['fingerprint_id']
        ]);

        echo json_encode(['status' => 'success', 'message' => 'Registration completed successfully.']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        http_response_code(500);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    http_response_code(405);
}