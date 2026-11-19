<?php

$routes = [
    'lecturer'   => 'LecturerController',
    'department' => 'DepartmentController',
    'course'     => 'CourseController',
];

$controllerKey = strtolower($_GET['controller'] ?? 'lecturer');
$controllerName = $routes[$controllerKey] ?? 'LecturerController';
$action = $_GET['action'] ?? 'index';

$controllerFile = __DIR__ . '/controllers/' . $controllerName . '.php';

if (!file_exists($controllerFile)) {
    http_response_code(404);
    die("Error: Controller file '{$controllerName}.php' not found.");
}

require_once $controllerFile;
$controllerInstance = new $controllerName();

if (!method_exists($controllerInstance, $action)) {
    http_response_code(404);
    die("Error: Action '{$action}' not found in '{$controllerName}'.");
}

$needsId = in_array($action, ['edit', 'update', 'delete'], true);
if ($needsId && !isset($_GET['id']) && !isset($_POST['id'])) {
    http_response_code(400);
    die("Error: ID is required for '{$action}' action.");
}

$controllerInstance->$action();
