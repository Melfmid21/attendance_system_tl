<?php
header('Content-Type: application/json');
require_once '../../config/pdo_database.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate incoming data
        if (!isset($_POST['subject_id'])) {
            throw new Exception('Subject ID is required');
        }
        
        $subject_id = trim($_POST['subject_id']);
        
        // Validate subject ID
        if (!is_numeric($subject_id)) {
            throw new Exception('Invalid subject ID');
        }
        
        // Check if the subject exists
        $check_stmt = $pdo->prepare("SELECT COUNT(*) FROM subjects WHERE id = :subject_id AND isDeleted = 0");
        $check_stmt->bindParam(':subject_id', $subject_id, PDO::PARAM_INT);
        $check_stmt->execute();
        
        if ($check_stmt->fetchColumn() == 0) {
            throw new Exception('Subject not found or already deleted');
        }
        
        // Soft delete the subject (update isDeleted flag)
        $stmt = $pdo->prepare("UPDATE subjects SET isDeleted = 1 WHERE id = :subject_id");
        $stmt->bindParam(':subject_id', $subject_id, PDO::PARAM_INT);
        
        if ($stmt->execute()) {
            echo json_encode([
                'success' => true,
                'message' => 'Subject deleted successfully'
            ]);
        } else {
            throw new Exception('Failed to delete subject');
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