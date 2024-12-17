<?php
header('Content-Type: application/json');
require_once '../../config/pdo_database.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate incoming data
        if (!isset($_POST['course_id'])) {
            throw new Exception('Course ID is required');
        }
        
        $course_id = trim($_POST['course_id']);
        
        // Validate course ID
        if (!is_numeric($course_id)) {
            throw new Exception('Invalid course ID');
        }
        
        // Check if the course exists
        $check_stmt = $pdo->prepare("SELECT COUNT(*) FROM department WHERE id = :course_id AND isDeleted = 0");
        $check_stmt->bindParam(':course_id', $course_id, PDO::PARAM_INT);
        $check_stmt->execute();
        
        if ($check_stmt->fetchColumn() == 0) {
            throw new Exception('Course not found or already deleted');
        }
        
        // Soft delete the course (update isDeleted flag)
        $stmt = $pdo->prepare("UPDATE department SET isDeleted = 1 WHERE id = :course_id");
        $stmt->bindParam(':course_id', $course_id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            echo json_encode([
                'success' => true,
                'message' => 'Course deleted successfully'
            ]);
        } else {
            throw new Exception('Failed to delete course');
        }
        
    } else {
        throw new Exception('Invalid request method');
    }
    
} catch (PDOException $e) {
    error_log("PDO Error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => 'Database error: ' . $e->getMessage()
    ]);
} catch (Exception $e) {
    error_log("General Error: " . $e->getMessage());
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}

$pdo = null;
?>