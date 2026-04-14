<?php
session_start();

$controller = $_GET['controller'] ?? 'Publicaciones';
$action     = $_GET['action'] ?? 'index';

$controllerName = $controller . "Controller";

$publicActions = ['login', 'loginProcess'];

if (!isset($_SESSION['id']) && !in_array($action, $publicActions)) {
	header("Location: index.php?controller=Auth&action=login");
	exit;
}

require_once "controllers/" . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->$action();
