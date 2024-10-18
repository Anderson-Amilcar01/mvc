<?php
// require_once 'libraries/fpdf186/fpdf.php';

class UserController {
    private $model;

    // Constructor
    public function __construct($model) {
        $this->model = $model;
    }

    // Redirige al índice principal
    public function index() {
        header('Location: index.php?action=index');
    }

    // Verificación de roles
    public function verifyRol($email) {
        $rol = $this->model->rol($email);
        
        // Inicia la sesión solo si no está ya iniciada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        // Asigna el rol en la sesión
        $_SESSION['rol'] = ($rol['rol'] === 1) ? 'admin' : 'user';
    }    

    // Métodos de autenticación
    public function showLoginForm() {
        require_once 'app/views/login.php';
    }

    public function login($email, $contrasena) {
        $login = $this->model->loginUser($email, $contrasena);
        if ($login) {
            session_start();
            $_SESSION['usuario'] = $email;
            $this->index();
        } else {
            echo 'Error al iniciar sesión';
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: index.php');
    }

    // Métodos de registro
    public function registerForm() {
        require_once 'app/views/register.php';
    }

    public function verifyEmail($email) {
        return !$this->model->verifyExistEmail($email);
    }

    public function createUser($nombre, $email, $contrasena) {
        return $this->model->createUser($nombre, $email, $contrasena);
    }

    // Gestión de código de verificación
    public function createVerifyCode($code, $email) {
        return $this->model->createVerifyCode($code, $email);
    }

    public function sendCodeDB($email) {
        $verifyCode = random_int(100000, 999999);
        return $this->model->createVerifyCode($verifyCode, $email);
    }

    public function getVerifyCode($email) {
        return $this->model->getVerifyCode($email);
    }

    public function sendEmail($email, $name, $code) {
        $emailSent = $email;
        $nameSent = $name;
        $codeSent = $code;
        
        require_once 'app/assets/emailjs.php';
    }

    // Mostrar formulario para verificar código
    public function verifyCodeForm() {
        require_once 'app/views/verifyCode.php';
    }
}
