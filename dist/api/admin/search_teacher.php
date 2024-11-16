<?php
require_once '../../config/pdo_database.php';
header('Content-Type: application/json');

// Check if 'query' is set in the GET request
if (isset($_GET['query'])) {
    // If 'query' is set, wrap the search term with '%' for a SQL LIKE search
    $searchTerm = $_GET['query'] . '%';
} else {
    // If 'query' is not set, default to '%%' to match any string
    $searchTerm = '%%';
}

try {
    $stmt = $pdo->prepare("SELECT id, firstname, middle_initial, lastname, gender, email 
                           FROM users 
                           WHERE role != 'admin' AND status != 'inactive' 
                           AND (firstname LIKE :searchTerm)");
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();
    $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (empty($teachers)) {
        try {
            $stmt = $pdo->prepare("SELECT id, firstname, middle_initial, lastname, gender, email 
                                   FROM users 
                                   WHERE role != 'admin' AND status != 'inactive' 
                                   AND (lastname LIKE :searchTerm)");
            $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
            $stmt->execute();
            $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
                echo json_encode($teachers);
     
            
        } catch (PDOException $e) {
            echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
        }
    }else{
        echo json_encode($teachers);
    }
    
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}