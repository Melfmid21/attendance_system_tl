<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

try {
    // Include database connection
    require_once '../../config/pdo_database.php';
    
    // Log the incoming request
    error_log("Received request method: " . $_SERVER['REQUEST_METHOD']);
    error_log("POST data: " . print_r($_POST, true));
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate incoming data
        if (!isset($_POST['subject_name']) || !isset($_POST['grade_level'])) {
            throw new Exception('Missing required fields');
        }
        
        $subject_name = trim($_POST['subject_name']);
        $grade_level = trim($_POST['grade_level']);
        
        // Additional validation
        if (empty($subject_name)) {
            throw new Exception('Subject name cannot be empty');
        }
        
        if (empty($grade_level)) {
            throw new Exception('Grade level cannot be empty');
        }
        
        // Check if connection exists
        if (!$pdo) {
            throw new Exception('Database connection failed');
        }

        // First check if course already exists
        $check_stmt = $pdo->prepare("SELECT COUNT(*) FROM subjects WHERE subject_name = :subject_name AND grade_level = :grade_level AND isDeleted = 0");
        $check_stmt->bindParam(':subject_name', $subject_name, PDO::PARAM_STR);
        $check_stmt->bindParam(':grade_level', $grade_level, PDO::PARAM_STR);
        $check_stmt->execute();
        
        if ($check_stmt->fetchColumn() > 0) {
            echo json_encode([
                'success' => false,
                'message' => 'Subject already exists!'
            ]);
            exit;
        }
        
        // If course doesn't exist, proceed with insertion
        $stmt = $pdo->prepare("INSERT INTO subjects (subject_name, grade_level, isDeleted) VALUES (:subject_name, :grade_level, 0)");
        
        if (!$stmt) {
            throw new Exception('Failed to prepare statement');
        }
        
        // Bind parameters
        $stmt->bindParam(':subject_name', $subject_name, PDO::PARAM_STR);
        $stmt->bindParam(':grade_level', $grade_level, PDO::PARAM_STR);
        
        // Execute the statement
        if ($stmt->execute()) {
            echo json_encode([
                'success' => true,
                'message' => 'Subject added successfully',
                'data' => [
                    'subject_name' => $subject_name,
                    'grade_level' => $grade_level
                ]
            ]);
        } else {
            $errorInfo = $stmt->errorInfo();
            throw new Exception('Database error: ' . $errorInfo[2]);
        }
        
    } else {
        throw new Exception('Invalid request method');
    }
    
} catch (PDOException $e) {
    error_log("PDO Error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Database error: ' . $e->getMessage(),
        'error_type' => 'PDO'
    ]);
} catch (Exception $e) {
    error_log("General Error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage(),
        'error_type' => 'General'
    ]);
}

// Close the connection
$pdo = null;
?>