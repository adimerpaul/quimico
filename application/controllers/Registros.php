<?php
class Registros extends CI_Controller {
function index(){
    if ($_SESSION['tipo']==""){
        header("Location: ".base_url());
    }
    $this->load->view('templates/header');
    $this->load->view('registros');
    $this->load->view('templates/footer');
}
function insert(){
    if ($_SESSION['tipo']==""){
        header("Location: ".base_url());
    }
    $entrada=$_POST['entrada'];
    $salida=$_POST['salida'];
    $tipo=$_POST['tipo'];
    $query=$this->db->query("SELECT * FROM kardex WHERE dia=DATE(NOW()) AND tipo='$tipo' AND turno='".$_SESSION['turno']."'");
    if ($query->num_rows()==1){
        echo "Ya fue registrado el dia no puede registrar mas";
        exit;
    }
    $query=$this->db->query("SELECT * FROM kardex WHERE tipo='$tipo' ORDER BY idkardex DESC LIMIT 1");
    $stdinicio=$query->row()->stdfinal;
    $stdfinal=(float)$stdinicio+(float)$entrada-(float)$salida;
    $this->db->query("INSERT INTO kardex SET stdinicio='$stdinicio',
ingreso='$entrada',
salida='$salida',
stdfinal='$stdfinal',
tipo='$tipo',
responsable='".$_SESSION['nombre']."',
dia='".date("Y-m-d")."',
idusuario='".$_SESSION['idusuario']."',
turno='".$_SESSION['turno']."'
");
    header("Location: ".base_url()."Registros");
}
}
