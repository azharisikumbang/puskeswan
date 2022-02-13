<?php 

$module = $_GET['module'] ?? 'errors';
$action = $_GET['action'] ?? 'not-found';
$handler = __DIR__ . '/modules/' . $module . '/' . $action . '.php';

if (!file_exists($handler)) {
	require_once './pages/not-found.php';
	exit();
}

require_once './modules/database/connection.php'; // $connection
require_once $handler;