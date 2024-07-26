<?php
// Incluye el archivo de configuración de la base de datos
require_once 'config/database.php';
// Incluye el archivo del modelo Usuario
require_once 'models/Usuario.php';
// Incluye el archivo del controlador UsuarioController
require_once 'controllers/UsuarioController.php';

// Crea una instancia de PDO para la conexión a la base de datos utilizando los datos de configuración
$db = new PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}", $dbConfig['user'], $dbConfig['password']);

// Crea una instancia del modelo Usuario, pasando la conexión de la base de datos como parámetro
$usuario = new Usuario($db);

// Crea una instancia del controlador UsuarioController, pasando el modelo Usuario como parámetro
$controller = new UsuarioController($usuario);

// Obtiene la acción solicitada desde la URL, si no se proporciona, se establece por defecto a 'index'
$action = $_GET['action'] ?? 'index';

// Estructura de control de flujo para determinar la acción a realizar
switch ($action) {
    case 'crear':
        // Si la solicitud es de tipo POST, se llama al método crear del controlador con los datos del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->crear($_POST['nombre'], $_POST['email']);
        } else {
            // Si la solicitud no es de tipo POST, se muestra el formulario de creación
            $controller->mostrarFormularioCrear();
        }
        break;
    case 'actualizar':
        // Si la solicitud es de tipo POST, se llama al método actualizar del controlador con los datos del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->actualizar($_POST['id'], $_POST['nombre'], $_POST['email']);
        } else {
            // Si la solicitud no es de tipo POST, se muestra el formulario de actualización
            $controller->mostrarFormularioActualizar($_GET['id']);
        }
        break;
    case 'eliminar':
        // Llama al método eliminar del controlador con el ID del usuario a eliminar
        $controller->eliminar($_GET['id']);
        break;
    default:
        // Si no se proporciona una acción válida, se llama al método index del controlador para mostrar la lista de usuarios
        $controller->index();
        break;
}
?>
