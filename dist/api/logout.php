<?php
header('Content-Type: application/json');
require_once '../controllers/accountController.php';

$controller = new AccountController();
$response = $controller->logout();
echo json_encode($response);
?>