<?php

class ModulesAdminController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    // Muestra el formulario para actualizar un módulo
    public function showUpdateModulesForm($id)
    {
        $producto = $this->model->readModules($id);
        require_once 'app/views/modulos/formularioActualizarModules.php';
    }

    // Muestra el formulario para crear un nuevo módulo
    public function showCreateModulesForm()
    {
        require_once 'app/views/modulos/formularioCrearModules.php';
    }

    // Mostrar listado de los módulos
    public function index() {
        $modulos = $this->model->readModules();
        require_once 'app/views/modulos/listaModulosAdmin.php';
    }

    // Crea un nuevo módulo
    public function create($nombre, $descripcion)
    {
        $create = $this->model->createModules($nombre, $descripcion);

        if ($create) {
            header('Location: index.php');
        } else {
            echo 'Error al crear el modulo';
        }
    }

    // Elimina un módulo
    public function delete($id)
    {
        if ($this->model->deleteModules($id)) {
            header('Location: index.php');
        } else {
            echo 'Error al borrar el modulo';
        }
    }

    // Actualiza un módulo existente
    public function update($id, $nombre, $descripcion)
    {
        $update = $this->model->updateModules($id, $nombre, $descripcion);

        if ($update) {
            header('Location: index.php');
        } else {
            echo 'Error al actualizar';
        }
    }
}
