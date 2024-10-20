<?php

//require_once BASE_PATH.'model/modelo.php'
class UserController {
    private $model;
    public function __construct($model){
        $this->model = $model;
    }

    public function createUser($name,$password) {  
        // Lógica para crear usuario
        
        // Lógica para validar los datos
        if(isset($_POST['name']) && !empty($_POST['name'])){
            if(isset($_POST['password']) && !empty($_POST['password'])){
                 $name = $_POST['name'];
                 $password = $_POST['password'];
                 $enviar= $this->model->crear($name,$password);
                 
            }else{
                echo "Error: El campo contraseña o el nombre no esta ingresado correctamente.";
            }
           
        }
        // Lógica para redirigir a otra página

    }
}
//porque las indicacione no puedo crear otro archivo para el model

?>