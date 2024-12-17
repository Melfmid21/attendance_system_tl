<?php
header('Content-Type: application/json');
require_once '../../config/pdo_database.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate incoming data
        if (!isset($_POST['subject_id']) || !isset($_POST['subject_name'])) {
            throw new Exception('Missing required fields');
        }
        
        $subject_id = trim($_POST['subject_id']);
        $subject_name = trim($_POST['subject_name']);
        
        // Validate inputs
        if (empty($subject_name)) {
            throw new Exception('Subject name cannot be empty');
        }
        
        // First check if the subject name is actually different from current
        $current_stmt = $pdo->prepare("SELECT subject_name FROM subjects WHERE id = :subject_id");
        $current_stmt->bindParam(':subject_id', $subject_id, PDO::PARAM_INT);
        $current_stmt->execute();
        
        $current_course = $current_stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($current_course && $current_course['subject_name'] === $subject_name) {
            echo json_encode([
                'success' => false,
                'message' => 'No changes detected'
            ]);
            exit;
        }
        
        // Check if the new name already exists for a different subject
        $check_stmt = $pdo->prepare("SELECT COUNT(*) FROM subjects 
                                   WHERE subject_name = :subject_name 
                                   AND id != :subject_id 
                                   AND grade_level = 'college' 
                                   AND isDeleted = 0");
        $check_stmt->bindParam(':subject_name', $subject_name, PDO::PARAM_STR);
        $check_stmt->bindParam(':subject_id', $subject_id, PDO::PARAM_INT);
        $check_stmt->execute();
        
        if ($check_stmt->fetchColumn() > 0) {
            echo json_encode([
                'success' => false,
                'message' => 'A subject with this name already exists!'
            ]);
            exit;
        }
        
        // Update the subject
        $stmt = $pdo->prepare("UPDATE subjects 
                              SET subject_name = :subject_name 
                              WHERE id = :subject_id");
        
        $stmt->bindParam(':subject_name', $subject_name, PDO::PARAM_STR);
        $stmt->bindParam(':subject_id', $subject_id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            echo json_encode([
                'success' => true,
                'message' => 'Subject updated successfully'
            ]);
        } else {
            throw new Exception('Failed to update subject');
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