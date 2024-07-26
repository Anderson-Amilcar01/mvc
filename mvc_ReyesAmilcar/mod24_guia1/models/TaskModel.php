<?php
class TaskModel {
    private $db;

    public function __construct(){
        $host = 'localhost';
        $dbname = 'bdmvc';
        $username = 'root';
        $pass = '';

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $pass);
        } catch (PDOException $e) {
            die('Error de conexion: ' . $e->getMessage());
        }
    }

    public function getAllTasks(){
        $query = $this->db->query("SELECT * FROM tasks");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function generatePDFReport(){
        $users= $this->model->getAllusers();
          $pdf=new FPDF();
          $pdf->AddPage();
          $pdf->SetY(40);
          $pdf->SetFont('Arial','B',16);
          $pdf->Cell(0,10,'Lista de docentes del Colegio',0,1,'C');
          $pdf->SetFont('Arial','',10);
          $pdf->SetFillColor(220,220,220);
          $pdf->Cell(30,10,'ID',1,0,'C',1);
          $pdf->Cell(60,10,'Nombre',1,0,'C',1);
          $pdf->Cell(80,10,'Correo',1,1,'C',1);
          foreach($users as $user){
              $pdf->Cell(30,10,$user['id'],1);
          $pdf->Cell(60,10,$user['name'],1);
          $pdf->Cell(80,10,$user['email'],1,1);
          }
          $pdf->Output();
          include'views/UserView.php';
      }
}
?>
