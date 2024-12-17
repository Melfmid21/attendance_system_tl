<?php
header('Content-Type: application/json');
require_once '../../config/pdo_database.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate incoming data
        if (!isset($_POST['course_id']) || !isset($_POST['course_name'])) {
            throw new Exception('Missing required fields');
        }
        
        $course_id = trim($_POST['course_id']);
        $course_name = trim($_POST['course_name']);
        
        // Validate inputs
        if (empty($course_name)) {
            throw new Exception('Course name cannot be empty');
        }
        
        // First check if the course name is actually different from current
        $current_stmt = $pdo->prepare("SELECT course_section_name FROM department WHERE id = :course_id");
        $current_stmt->bindParam(':course_id', $course_id, PDO::PARAM_INT);
        $current_stmt->execute();
        
        $current_course = $current_stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($current_course && $current_course['course_section_name'] === $course_name) {
            echo json_encode([
                'success' => false,
                'message' => 'No changes detected'
            ]);
            exit;
        }
        
        // Check if the new name already exists for a different course
        $check_stmt = $pdo->prepare("SELECT COUNT(*) FROM department 
                                   WHERE course_section_name = :course_name 
                                   AND id != :course_id 
                                   AND grade_level = 'college' 
                                   AND isDeleted = 0");
        $check_stmt->bindParam(':course_name', $course_name, PDO::PARAM_STR);
        $check_stmt->bindParam(':course_id', $course_id, PDO::PARAM_INT);
        $check_stmt->execute();
        
        if ($check_stmt->fetchColumn() > 0) {
            echo json_encode([
                'success' => false,
                'message' => 'A course with this name already exists!'
            ]);
            exit;
        }
        
        // Update the course
        $stmt = $pdo->prepare("UPDATE department 
                              SET course_section_name = :course_name 
                              WHERE id = :course_id");
        
        $stmt->bindParam(':course_name', $course_name, PDO::PARAM_STR);
        $stmt->bindParam(':course_id', $course_id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            echo json_encode([
                'success' => true,
                'message' => 'Course updated successfully'
            ]);
        } else {
            throw new Exception('Failed to update course');
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