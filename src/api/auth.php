<?php
require_once "../controller/auth.php";

header("Content-Type: application/json");
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);


switch ($method) {
    case 'POST':
        $email = $input['email'];
        $password = $input['password'];
        $result = HandlerAuth::handleLogin($email, $password);
        echo json_encode($result);
        break;
    default:
        echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
        break;
}
