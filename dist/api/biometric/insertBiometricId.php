<?php
header('Content-Type: application/json');
//http://192.168.254.175/client_folder/attendance_system_tl/dist/api/biometric/insertBiometricId.php
// Include the PDO database connection
require_once '../../config/pdo_database.php';

//Tester Id
//$uniqueID = "1";
// Retrieve the unique ID from the query string
 $uniqueID = isset($_GET['id']) ? $_GET['id'] : "";

if (empty($uniqueID)) {
    echo json_encode(["status" => "error", "message" => "No ID provided"]);
    exit;
}

try {
    // Check if the ID exists in the database
    $stmt = $pdo->prepare("SELECT COUNT(*) as count FROM biometric WHERE biometric_id = :biometric_id");
    $stmt->execute(['biometric_id' => $uniqueID]);
    $result = $stmt->fetch();

    if ($result['count'] > 0) {
        // ID exists in the database
        echo json_encode(["status" => "success", "exists" => true, "message" => "ID already exist"]);
    } else {
        // ID does not exist, insert it
        $insertStmt = $pdo->prepare("INSERT INTO biometric (biometric_id) VALUES (:biometric_id)");
        $insertStmt->execute(['biometric_id' => $uniqueID]);
        
        echo json_encode(["status" => "success", "exists" => false, "message" => "ID inserted"]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "exists" => false, "message" => $e->getMessage()]);
}
?>