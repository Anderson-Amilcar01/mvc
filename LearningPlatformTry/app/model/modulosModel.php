<?php
class ModulosModel {
    private $db;

    public function __construct($db){

        $this->db = $db;
    }
    //muestra los cursos o modulos
    public function readModules($id = null){
        if ($id) {
            $sql = "SELECT * FROM curso WHERE id_curso = :id";

            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $sql = "SELECT * FROM curso";

            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    //crea los modulos o cursos
    public function createModules($nombre, $descripcion) {
        try {
            $sql = "INSERT INTO curso (nombre, descripcion) VALUES (:nombre, :descripcion)";
        
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':nombre', $nombre);
            $stmt->bindparam(':descripcion', $descripcion);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateModules($id, $nombre, $descripcion) {
        try {
            $sql = "UPDATE curso SET nombre = :nombre, descripcion = :descripcion WHERE id_curso = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':nombre', $nombre);
            $stmt->bindparam(':descripcion', $descripcion);
            $stmt->bindparam(':id', $id);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function deleteModules($id) {
        $slq = "DELETE FROM curso WHERE id_curso = :id";

        $stmt = $this->db->prepare($slq);
        $stmt->bindparam(':id', $id);

        return $stmt->execute();
    }

    

}