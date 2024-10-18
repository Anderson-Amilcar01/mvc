<?php

class UserModel {
    private $db;

    // Constructor
    public function __construct($db) {
        $this->db = $db;
    }

    // Métodos relacionados con la autenticación
    public function loginUser($email, $contrasena) {
        try {
            $sql = "SELECT * FROM usuario WHERE email = :email AND contrasena = :contrasena";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':contrasena', $contrasena);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function mostrarU(){
        try{
            $sql = "SELECT * FROM usuario";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
    }
   
    public function rol($email) {
        try {
            $sql = "SELECT rol FROM usuario WHERE email = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

     //opcional poner
     public function cambioRoladmin(){
        try{
            $sql = "UPDATE usuario SET rol = 2 WHERE id = 1";
            $stmt = $this->db->prepare($sql);
             return $stmt->execute();
            } catch (PDOException $e) {
                echo 'Error: ' . $e->getMessage();
                }
    }

    // Métodos relacionados con la verificación de correo y código
    public function verifyExistEmail($email) {
        $sql = "SELECT email FROM usuario WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyStatus($id) {
        $sql = "SELECT `verify-status` FROM usuario WHERE `id_usuario` = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        //recupera a los usuarios o los busca
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createVerifyCode($code, $email) {
        try {
            $sql = "UPDATE usuario SET `verify-code` = :code WHERE email = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':code', $code);
            $stmt->bindParam(':email', $email);

            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }

    public function getVerifyCode($email) {
        $sql = "SELECT `verify-code` FROM usuario WHERE `email` = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $result ? $result['verify-code'] : null;
    }

    // Métodos relacionados con la creación de usuario
    public function createUser($nombre, $email, $contrasena) {
        try {
            $sql = "INSERT INTO usuario (nombre, email, contrasena) VALUES (:nombre, :email, :contrasena)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':contrasena', $contrasena);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return false;
    }
    
}
