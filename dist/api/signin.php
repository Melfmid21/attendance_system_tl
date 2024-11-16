<?php
session_start();
require_once '../config/pdo_database.php'; // Including the database connection

// Get the JSON data from the request
$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'];
$password = $data['password'];

try {
    $query = "SELECT id, role, email, password FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Successful login - start session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['email'] = $user['email'];

        // Send a JSON response with success status and role
        echo json_encode([
            "success" => true,
            "role" => $user['role']
        ]);
    } else {
        // Invalid login
        echo json_encode([
            "success" => false,
            "message" => "Invalid email or password"
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        "success" => false,
        "message" => "An error occurred. Please try again."
    ]);
}
?>