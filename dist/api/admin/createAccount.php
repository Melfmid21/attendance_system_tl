<?php
header('Content-Type: application/json');
require_once '../../controllers/admin/accountController.php';

$controller = new AccountController();
$response = $controller->createAccount();
echo json_encode($response);
?>