<?php
//aqui estan los leves, cuestionario, mensajes y foros
class LevelsModel {
    private $db;

    public function __construct($db){

        $this->db = $db;
    }

    public function readLevels($id = null){
        if ($id) {
            $sql = "SELECT * FROM nivel WHERE id_curso = :id";

            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id',$id);
            $stmt->execute();
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $sql = "SELECT * FROM nivel";

            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function crearLevels($idu,$idc,$name,$estado){
        //idu= id del curso
        //idc= id del cuestionario
        //name= nombre
        //estado= estado del nivel si esta pasado o no
        try{
            $sql="INSERT INTO nivel(id_curso,id_cuestionario,nombre,estado) VALUES (:idu,:idc,:nombre,:estado)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':idu',$idu);
            $stmt->bindParam(':idc',$idc);
            $stmt->bindParam(':nombre',$name);
            $stmt->bindParam(':estado',$estado);
            return $stmt->execute();
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }

    public function modificarLevels($idu,$idc,$name,){
        try{
            $sql="UPDATE nivel SET id_curso=:idu,id_cuestionario=:idc,nombre=:nombre";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':idu',$idu);
            $stmt->bindParam(':idc',$idc);
            $stmt->bindParam(':nombre',$name);
            
            return $stmt->execute();

        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
        }
    }
    
    //creacion de cuestionarios
    public function crearCuestionario($pregunta,$pa,$rc,$re1,$re2,$re3){
        try{
            //pa= parrafo
            //rc= respuesta corecta
            //re1, re2, re3= respuestas incorrectas o complementarias
            $sql="INSERT INTO cuestionario (preguntas,parrafo,respuesta_correcta,r1,r2,r3) VALUES (:pregunta,:texto,:verdadera,:r1,:r2,:r3)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':pregunta',$pregunta);
            $stmt->bindParam(':texto',$pa);
            $stmt->bindParam(':verdadera',$rc);
            $stmt->bindParam(':r1',$re1);
            $stmt->bindParam(':r2',$re2);
            $stmt->bindParam(':r3',$re3);
           return $stmt->execute();
    
        }catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

    } 

    public function viewForo(){
        try{
        $sql = "SELECT * FROM foro";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function crearForo($id,$titulo,$descr){
        try{
            $sql = "INSERT INTO foro (id_usuario,titulo,problema) VALUES (:user,:titulo,:problema)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':user',$id);
            $stmt->bindParam(':titulo',$titulo);
            $stmt->bindParam(':problema',$descr);
            return $stmt->execute();
            }catch(PDOException $e){   
                echo 'Error: ' . $e->getMessage();
                }
    }

    public function updateForo($id, $titulo, $contenido) {
        try {
            // Consulta SQL para actualizar el foro con un ID específico
            $sql = "UPDATE foro SET titulo = :titulo, contenido = :contenido WHERE id_foro = :id";
            $stmt = $this->db->prepare($sql);
    
            // Asignar los parámetros a la consulta
            $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
            $stmt->bindParam(':contenido', $contenido, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
            // Ejecutar la consulta
            $stmt->execute();
    
            // Devolver el número de filas afectadas para verificar si se hizo el cambio
            return $stmt->rowCount();
    
        } catch (PDOException $e) {
            // Manejo de errores
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }    

    public function borraForo($id){
        try{
            $sql = "DELETE FROM foro WHERE id_foro=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id',$id);
            return $stmt->execute();
            }catch(PDOException $e){
                echo 'Error: ' . $e->getMessage();
                }
    } 

    public function verMesaje(){
        try{
            $sql = "SELECT * FROM mensaje";
            $stmt = $this->db->query($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }

    }

    public function crearMensaje($idu,$idf,$conte,$fecha){
        /* 
        idu= id usuario
        idf= id foro
        conte= contenido
        fecha= fecha de creacion
        */
        try{
            $sql="INSERT INTO mensaje(id_usuario,id_foro,contenido,fecha_mensaje) VALUES (:idu,:idf,:conte,:fecha)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':idu',$idu);
            $stmt->bindParam(':idf',$idf);
            $stmt->bindParam(':conte',$conte);
            $stmt->bindParam(':fecha',$fecha);
            return $stmt->execute();
        }catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function modificarMensaje($id, $contenido) {
        try {
            // Consulta SQL para actualizar el contenido del mensaje con un ID específico
            $sql = "UPDATE mensaje SET contenido = :conte WHERE id_mensaje = :id";
            $stmt = $this->db->prepare($sql);
            
            // Asignar los parámetros a la consulta
            $stmt->bindParam(':conte', $contenido, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            
            // Ejecutar la consulta
            $stmt->execute();
            
            // Devolver el número de filas afectadas para verificar si se hizo el cambio
            return $stmt->rowCount();
    
        } catch (PDOException $e) {
            // Manejo de errores
            echo 'Error: ' . $e->getMessage();
            return false;
        }
    }
        public function borraMensaje($id){
            try{
                $sql="DELETE FROM mensaje WHERE id=:id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':id',$id);
                $stmt->execute();
            }catch (PDOException $e) {
                // Manejo de errores
                echo 'Error: ' . $e->getMessage();
                return false;
            }
        
    }

}