<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("Usuarios_model");
    }

	public function index()
	{   
        if ($this->session->userdata("login")){
            redirect(base_url()."dashboard");
        }
        else {
            $this->load->view('admin/login');
        }

    }
    
    public function login(){
        $userEmail = $this->input->post("correo");
        $userPassword = $this->input->post("password");

        $res= $this->Usuarios_model->login($userEmail, $userPassword);

        if (!$res) {
            $this->session->set_flashdata("error", "Usuario y/o contraseña son incorrectos");
            redirect(base_url());
        } else {
            $data = array (
                'id' => $res->codigo_asesor,
                'Nombre_Usuario' => $res->asesor_nombres,
                'login' => TRUE
            );
            $this->session->set_userdata($data);
            redirect(base_url()."dashboard");
            
        }
        
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
