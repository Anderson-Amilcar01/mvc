<?php
// Definición de una clase llamada UsuarioController
class UsuarioController {
    // Declaración de una propiedad privada llamada $modelo
    private $modelo;

    // Método constructor que recibe una instancia del modelo y la asigna a la propiedad $modelo
    public function __construct($modelo) {
        $this->modelo = $modelo;
    }

    // Método para mostrar la lista de usuarios
    public function index() {
        // Obtiene todos los usuarios llamando al método leer del modelo
        $usuarios = $this->modelo->leer();
        // Incluye la vista que muestra la lista de usuarios
        require 'views/lista_usuarios.php';
    }

    // Método para mostrar el formulario de creación de usuario
    public function mostrarFormularioCrear() {
        // Incluye la vista que muestra el formulario para agregar un usuario
        require 'views/agregar_usuario.php';
    }

    // Método para crear un nuevo usuario
    public function crear($nombre, $email) {
        // Llama al método crear del modelo para agregar un nuevo usuario
        if ($this->modelo->crear($nombre, $email)) {
            // Si la creación es exitosa, redirige a la página principal
            header('Location: index.php');
        } else {
            // Si hay un error, muestra un mensaje de error
            echo "Error al crear el usuario";
        }
    }

    // Método para mostrar el formulario de actualización de un usuario
    public function mostrarFormularioActualizar($id) {
        // Obtiene los datos del usuario llamando al método leer del modelo con el ID del usuario
        $usuario = $this->modelo->leer($id);
        // Incluye la vista que muestra el formulario para actualizar un usuario
        require 'views/actualizar_usuario.php';
    }

    // Método para actualizar los datos de un usuario
    public function actualizar($id, $nombre, $email) {
        // Llama al método actualizar del modelo para modificar los datos del usuario
        if ($this->modelo->actualizar($id, $nombre, $email)) {
            // Si la actualización es exitosa, redirige a la página principal
            header('Location: index.php');
        } else {
            // Si hay un error, muestra un mensaje de error
            echo "Error al actualizar el usuario";
        }
    }

    // Método para eliminar un usuario
    public function eliminar($id) {
        // Llama al método eliminar del modelo para borrar el usuario
        if ($this->modelo->eliminar($id)) {
            // Si la eliminación es exitosa, redirige a la página principal
            header('Location: index.php');
        } else {
            // Si hay un error, muestra un mensaje de error
            echo "Error al eliminar el usuario";
        }
    }
}
?>
