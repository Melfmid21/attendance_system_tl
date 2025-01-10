<?php
header('Content-Type: application/json');
// http://192.168.254.175/client_folder/attendance_system_tl/dist/api/biometric/checkBiometricMode.php
// Include the PDO database connection
require_once '../../config/pdo_database.php';

// Retrieve the unique ID from the query string
 $uniqueID = isset($_GET['id']) ? $_GET['id'] : "";
//$uniqueID = "1846FD519140";
if (empty($uniqueID)) {
    echo json_encode(["status" => "error", "message" => "No ID provided"]);
    exit;
}

try {
    // Prepare the SQL statement to fetch the mode where biometric_id matches
    $stmt = $pdo->prepare("SELECT mode FROM biometric WHERE biometric_id = :biometric_id");
    $stmt->execute(['biometric_id' => $uniqueID]);

    $result = $stmt->fetch();
    $mode = $result['mode'];
    if ($mode == 'attendance'){
        $mode = 0;
    } else if ($mode == 'registration') {
        $mode = 1;
    }
    
    if ($result) {
        echo json_encode([
            "status" => "success",
            "exists" => true,
            "mode" => $mode,
            "message" => "Biometric ID exists and mode is retrieved."
        ]);
    } else {
        echo json_encode([
            "status" => "success",
            "exists" => false,
            "message" => "Biometric ID doesn't exist."
        ]);
    }
} catch (Exception $e) {
    echo json_encode([
        "status" => "error",
        "exists" => false,
        "message" => $e->getMessage()
    ]);
}
?>