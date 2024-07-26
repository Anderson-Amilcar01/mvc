<?php
require_once'config/bd.php';

$db= new PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}", $dbConfig['user'], $dbConfig['password']);

class modelo{


    private $db;

    public function __construct($db){
        $this->db=$db;
    }   
    //cambiar el nombre de la tabla y para metros por la bd
    public function getAllUsers(){
    $querry="SELECT*FROM gente";
    $result=$this->db->query($querry);
    return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    //cambiar el nombre de la tabla y para metros por la bd
    public function crearusu($nombre,$email){
        $querry="INSERT INTO gente(nombre,email) VALUES(:nombre,:email)";
        $stmt=$this->db->prepare($querry);
        $stmt->bindParam(':nombre',$nombre);
        $stmt->bindParam(':email',$email);
        return  $stmt->execute();
    }
    //cambiar el nombre de la tabla y para metros por la bd
    public function updateUser($id, $name, $email) {
        $query="UPDATE users SET name = :name, email = :email WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email); 
        return $stmt->execute();
        }
        //cambiar el nombre de la tabla y para metros por la bd
    public function eliminarusu($id){
        $querry="DELETE FROM gente WHERE id=:id";
        $stmt=$this->db->prepare($querry);
        $stmt->bindParam(':id',$id);
        return $stmt->execute();

    }

}
?>