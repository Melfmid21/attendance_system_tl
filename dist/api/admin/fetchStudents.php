<?php
header('Content-Type: application/json');
require_once '../../controllers/admin/studentController.php';

$controller = new StudentController();
$students = $controller->getStudents();
echo json_encode(["success" => true, "students" => $students]);
?>