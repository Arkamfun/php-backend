<?php
require_once "../controller/user.php";

header("Content-Type: application/json");
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);
$path = isset($_SERVER["PATH_INFO"]) ? explode('/', trim($_SERVER["PATH_INFO"], '/')) : [];
$id = isset($path[0]) ? $path[0] : null;

switch ($method) {
    case 'GET':
        if ($id) {
            $data = HandleUser::handleGetById($id);
        } else {
            $data = HandleUser::handleGetAll();
        }

        echo json_encode($data);

        break;
    case 'POST':
        // echo "ini POST";

        // echo json_encode($input);

        $result = HandleUser::handleCreateUser($input);
        echo json_encode($result);
        break;
    case 'DELETE':
        if ($id) {
            $result = HandleUser::handleDeleteUser($id);
            echo json_encode($result);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'ID not found']);
        }
        break;
    default:
        echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
        break;
}
