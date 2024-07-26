<?php
class Usuario {
    // Propiedad privada para almacenar la conexión a la base de datos
    private $db;

    // Constructor de la clase
    public function __construct($db) {
        // Almacena la conexión a la base de datos proporcionada
        $this->db = $db;
    }

    // Método para crear un nuevo usuario
    public function crear($nombre, $email) {
        // Prepara la consulta SQL para insertar un nuevo usuario
        $sql = "INSERT INTO usuarios (nombre, email) VALUES (:nombre, :email)";
        
        // Crea un objeto de declaración preparada
        $stmt = $this->db->prepare($sql);
        
        // Vincula los parámetros a la consulta preparada
        // Esto ayuda a prevenir inyecciones SQL y mejora el rendimiento
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        
        // Ejecuta la consulta preparada y devuelve el resultado
        return $stmt->execute();
    }

    // Método para leer uno o todos los usuarios
    public function leer($id = null) {
        if ($id) {
            // Si se proporciona un ID, prepara una consulta para obtener un usuario específico
            $sql = "SELECT * FROM usuarios WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            // Devuelve el resultado como un array asociativo
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            // Si no se proporciona un ID, obtiene todos los usuarios
            $sql = "SELECT * FROM usuarios";
            $stmt = $this->db->query($sql);
            // Devuelve todos los resultados como un array de arrays asociativos
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    // Método para actualizar un usuario existente
    public function actualizar($id, $nombre, $email) {
        // Prepara la consulta SQL para actualizar un usuario
        $sql = "UPDATE usuarios SET nombre = :nombre, email = :email WHERE id = :id";
        
        // Crea un objeto de declaración preparada
        $stmt = $this->db->prepare($sql);
        
        // Vincula los parámetros a la consulta preparada
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        
        // Ejecuta la consulta preparada y devuelve el resultado
        return $stmt->execute();
    }

    // Método para eliminar un usuario
    public function eliminar($id) {
        // Prepara la consulta SQL para eliminar un usuario
        $sql = "DELETE FROM usuarios WHERE id = :id";
        
        // Crea un objeto de declaración preparada
        $stmt = $this->db->prepare($sql);
        
        // Vincula el parámetro ID a la consulta preparada
        $stmt->bindParam(':id', $id);
        
        // Ejecuta la consulta preparada y devuelve el resultado
        return $stmt->execute();
    }
}