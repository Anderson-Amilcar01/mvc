<?php
// require_once 'libraries/fpdf186/fpdf.php';
class LevelsController {
    private $model;

    public function __construct($model) {

        $this->model = $model;
    }

    public function index($modulo) {
        $niveles = $this->model->readLevels($modulo);
        require_once 'app/views/niveles/listaNiveles.php';
        // require_once 'views/niveles/pruebas.php';
    }

    public function update($id, $nombre, $descripcion) {
        $update = $this->model->updateModules($id, $nombre, $descripcion);

        if ($update) {
            header('Location: index.php');
        } else {
            echo 'Error al actualizar';
        }
    }

    public function showUpdateModulesForm($id) {
        $producto = $this->model->readModules($id);

        require_once 'app/views/modulos/formularioActualizarModules.php';
    }
    
    public function showCreateModulesForm() {
        require_once 'app/views/modulos/formularioCrearModules.php';
    }
    
    public function showLoginForm() {
        require_once 'app/views/formularioSesion.php';
    }

    public function create($nombre, $descripcion) {
        $create = $this->model->createModules($nombre, $descripcion);

        if ($create) {
            header('Location: index.php');
        } else {
            echo 'Error al crear el modulo';
        }
    }

    public function delete($id) {
        if ($this->model->deleteModules($id)) {
            header('Location: index.php');
        } else {
            echo 'Error al borrar el modulo';
        }
    }
}
