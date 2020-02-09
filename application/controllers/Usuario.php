<?php
class Usuario extends CI_Controller{
function index(){
    if ($_SESSION['tipo']==""){
        header("Location: ".base_url());
    }
    $this->load->view('templates/header');
    $this->load->view('usuario');
    $this->load->view('templates/footer');
}
function insert(){
    $nombre=$_POST['nombre'];
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];
    $turno=$_POST['turno'];
    $tipo=$_POST['tipo'];
    $this->db->query("INSERT INTO usuario SET 
nombre='$nombre',
usuario='$usuario',
clave='$password',
tipo='$tipo',
turno='$turno'
");
    header("Location: ".base_url()."Usuario");
}
function modificar(){
    $nombre=$_POST['nombre'];
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];
    $turno=$_POST['turno'];
    $tipo=$_POST['tipo'];
    $idusuario=$_POST['idusuario'];
    $this->db->query("UPDATE usuario SET 
nombre='$nombre',
usuario='$usuario',
clave='$password',
tipo='$tipo',
turno='$turno'
WHERE idusuario='$idusuario'
");
    header("Location: ".base_url()."Usuario");
}
function eliminar($idusuario){
    $this->db->query("DELETE FROM usuario WHERE idusuario=$idusuario");
    header("Location: ".base_url()."Usuario");
}
function baja($idusuario){
    $query=$this->db->query("SELECT * FROM usuario WHERE idusuario=$idusuario");
    $estado=$query->row()->estado;
    if ($estado=='ACTIVO'){
        $this->db->query("UPDATE usuario SET estado='INACTIVO'WHERE idusuario='$idusuario'");
    }else{
        $this->db->query("UPDATE usuario SET estado='ACTIVO' WHERE idusuario='$idusuario'");
    }
    header("Location: ".base_url()."Usuario");
}
function datos($idusuario){
    $query=$this->db->query("SELECT * FROM usuario WHERE idusuario=$idusuario");
    echo json_encode($query->result_array());
}
}
