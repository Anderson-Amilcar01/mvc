<?php
require_once 'models/UserModel.php';
require_once 'controllers/UserController.php';
require_once 'views/UserView.php';
require_once ("lib/FPDF/fpdf.php");
// Configuración de la base de datos (usando PDO)
$db = new PDO('mysql:host=localhost; dbname=ejmvc2', 'root', '');
$model = new UserModel($db);
$view = new UserView();
$controller = new UserController($model, $view);
$action = isset($_GET['action']) ? $_GET['action']: 'display';


switch ($action) { 
    case 'display':
    $controller->displayUsers();
    break;
    case 'create':
    $controller->createUser();
    break;
    case 'update':
    $controller->updateUser();
    break;
    case 'delete':
    $controller->deleteUser();
    break;
    case 'createpdf':
        $controller->generatePDFReport();

    default:
    echo "Invalid action!";
    }
?>
