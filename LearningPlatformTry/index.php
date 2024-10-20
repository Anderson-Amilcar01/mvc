<?php
// Configuración y requerimientos
require_once 'app/config/config.php';
require_once 'app/controller/controller.php';
require_once 'app/model/model.php';

require_once 'app/model/modulosModel.php';
require_once 'app/controller/modulos.php';

require_once 'app/model/levelsModel.php';
require_once 'app/controller/levels.php';

require_once 'app/controller/admin/modules.php';

// Conexión a la base de datos
$db = new PDO("mysql:host={$dbconfig['host']};dbname={$dbconfig['dbname']}", $dbconfig['dbuser'], $dbconfig['dbpass']);

// Inicialización de modelos y controladores
$modelo = new UserModel($db);
$controller = new UserController($modelo);

$modulosModel = new ModulosModel($db);
$modulosController = new ModulosController($modulosModel);

$levelsModel = new LevelsModel($db);
$levelsController = new LevelsController($levelsModel);

// Zona de administradores
$adminModulesController = new ModulesAdminController($modulosModel);

// Obtener acción desde el parámetro GET
$action = $_GET['action'] ?? 'index';

// Estructura de control de acciones
switch ($action) {
    case 'index':
        session_start();
        if (!isset($_SESSION['usuario'])) {
            $controller->showLoginForm();
        } else {
            $modulosController->index();
        }
        break;

    case 'modulos':
        $modulosController->index();
        break;

    case 'openModule':
        $module = $_GET['module'];
        if ($module) {
            $levelsController->index($module);
        } else {
            echo 'Error en el servidor';
        }
        break;

    case 'login':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $controller->login($_POST['email'], $_POST['contrasena']);
        } else {
            echo 'Error en el servidor';
        }
        break;

    case 'register':
        $controller->registerForm();
        break;

    case 'registerFormSent':
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($controller->verifyEmail($_POST['email'])) {
                $createUser = $controller->createUser($_POST['nombre'], $_POST['email'], $_POST['contrasena']);
                if ($createUser == true) {
                    $sendEmail = $controller->sendCodeDB($_POST['email']);
                    if ($sendEmail == true) {
                        $_SESSION['email'] = $_POST['email'];
                        $code = $controller->getVerifyCode($_POST['email']);
                        if ($code) {
                            $controller->sendEmail($_POST['email'], $_POST['nombre'], $code);
                        } else {
                            echo 'We can not get your code';
                        }
                    } else {
                        echo 'Error al enviar el código de verificación a la base de datos';
                    }
                } else {
                    echo 'No se pudo crear el usuario';
                }
            } else {
                echo 'Error en la verificación del correo, probablemente ya está en uso';
            }
        } else {
            echo 'Error en el servidor';
        }
        break;

    case 'verifyCodeForm':
        $controller->verifyCodeForm();
        break;

    case 'verifyCode':
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $codetoVerify = $_POST['code'];
            $emailReference = $_SESSION['email'] ?? null;

            if ($emailReference === null) {
                echo 'Error: No email found in session';
                break;
            }

            $trulyCode = $controller->getVerifyCode($emailReference);

            if ($codetoVerify == $trulyCode) {

                $controller->index();
                session_destroy();
            } else {
                echo 'Wrong code, pls try again';
            }
        }
        break;

    case 'logout':
        $controller->logout();
        break;

    case 'adminView':
        session_start();

        // Asignar el usuario de la sesión
        $usuario = $_SESSION['usuario']; // Contiene el email

        $controller->verifyRol($usuario);

        // Verificar el rol asignado y proceder según el caso
        if ($_SESSION['rol'] === 'admin') {

            $tabla = $_GET['table'];
            $action = $_GET['action'];
            $adminModulesController->index(); // Llamada al controlador de administrador
        } else {
            header('Location: index.php');
            exit();
        }
        break;

    default:
        echo 'Acción no reconocida';
        break;
}
