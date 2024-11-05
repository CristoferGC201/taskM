<?php
require_once __DIR__ . '/app/models/Task.php';
require_once __DIR__ . '/app/controllers/TaskController.php';
require_once __DIR__ . '/config/db.php'; // Asegúrate de que este archivo contenga la conexión a la base de datos.

$controller = new TaskController($db);

$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

if ($action === 'edit' && $id) {
    $controller->edit($id);
} elseif ($action === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->update($id, $_POST['title'], $_POST['description']);
} elseif ($action === 'delete' && $id) {
    $controller->delete($id);
} elseif ($action === 'create' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->create($_POST['title'], $_POST['description']);
} else {
    $controller->index();
}
