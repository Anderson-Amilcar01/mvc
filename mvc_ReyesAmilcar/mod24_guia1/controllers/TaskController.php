<?php
require_once 'models/TaskModel.php';
require_once ("lib/FPDF/fpdf.php");
class TaskController {
    private $model;

    public function __construct() {
        $this->model = new TaskModel();
    }

    public function index() {
        $tasks = $this->model->getAllTasks(); // Corregido el nombre del método
        include 'views/tasks/index.php';
    }
    public function generatePDFReport(){
        $users= $this->model->getAllTasks();
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
          $pdf->Cell(60,10,$user['title'],1);
          $pdf->Cell(0,10,$user['Created_at'],1,1);
          $pdf->Cell(80,10,$user['Asignado'],1,1);
          }
          $pdf->Output();
          include'views/tasks/index.php';
      }

}
?>
