<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	function login(){
	    $usuario=$_POST['usuario'];
        $clave=$_POST['clave'];
        $query=$this->db->query("SELECT * FROM usuario WHERE usuario='$usuario' AND clave='$clave' AND estado='ACTIVO'");
        if ($query->num_rows()=="1"){
            $_SESSION['tipo']=$query->row()->tipo;
            $_SESSION['nombre']=$query->row()->nombre;
            $_SESSION['usuario']=$query->row()->usuario;
            $_SESSION['idusuario']=$query->row()->idusuario;
            $_SESSION['turno']=$query->row()->turno;
            header('Location: '.base_url().'Main');
        }else{
            header('Location: '.base_url());
        }

    }
    function logout(){
	    session_destroy();
	    header("Location: ".base_url());
    }
}
