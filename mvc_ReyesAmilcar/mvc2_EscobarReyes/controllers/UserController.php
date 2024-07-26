<?php 
require_once ("lib/FPDF/fpdf.php");
class UserController{
    private $model;
    private $view;
    
    public function __construct($model,$view){
        $this->model=$model;
        $this->view=$view;
    }
    public function displayUsers(){
        $users=$this->model->getAllusers();
        $this->view->showAllUsers($users);
    }
    
public function createUser() { 
    if ($_SERVER['REQUEST_METHOD']==='POST'){
    $name=$_POST['name'];
    $email =$_POST['email'];
    $this->model->createUser($name, $email);
    header('Location: index.php?action=display');
    } else {
    $this->view->showUserForm('index.php?action=create');
    }
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
    
public function updateUser() { if ($_SERVER['REQUEST_METHOD']==='POST') {
    $id=$_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    
    $this->model->updateUser($id, $name, $email); header('Location: index.php?action=display');
    } else {
    $id = $_GET['id'];
    $users = $this->model->getAllUsers();
    $userToUpdate=null;

    foreach ($users as $user) {
    if ($user['id'] == $id) {
    $userToUpdate=$user;
    break;
    }
        }
            if ($userToUpdate) {
             $this->view->showUserForm("index.php?action=update&id=$id",$userToUpdate);
            }else{
              echo'Usuario no encontrado.';
       }     
     }
    }
    public function deleteUser(){
        $id=$_GET['id'];
        $this->model->deleteUser($id);
        header('Location: index.php?action=display');
    }
}

?>