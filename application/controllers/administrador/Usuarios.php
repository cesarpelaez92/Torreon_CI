<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {
    
    private $permisos;
    public function __construct(){
        parent::__construct();
        $this->permisos = $this->backend_lib->control();
        $this->load->model("Usuarios_model");
    }

    public function index(){
        $data = array(
            'permisos' => $this->permisos,
            'usuarios' => $this->Usuarios_model->getUsuarios(),
        );

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/list', $data);
		$this->load->view('layouts/footer');
    }

    public function add(){
        $data = array(
            'roles' => $this->Usuarios_model->getRoles(),
        );

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/add', $data);
		$this->load->view('layouts/footer');
    }

    public function store(){
        $nombres = $this->input->post("asesor_nombres");
        $apellidos = $this->input->post("asesor_apellidos");
        $cedula = $this->input->post("asesor_cedula");
        $telefono = $this->input->post("asesor_telefono");
        $email = $this->input->post("asesor_correo");
        $contraseña = $this->input->post("codigo_asesor");
        $rol = $this->input->post("rol");

        $this->form_validation->set_rules("asesor_cedula","asesor_cedula","required|is_unique[asesor.asesor_cedula]");
        
        $data = array(
            'asesor_nombres' =>$nombres,
            'asesor_apellidos' =>$apellidos,
            'asesor_cedula' =>$cedula,
            'asesor_telefono' =>$telefono,
            'asesor_correo' =>$email,
            'codigo_asesor' =>$contraseña,
            'rol_id' =>$rol,
            'estado' => "1",
        );

        if ($this->Usuarios_model->save($data)) {
            redirect(base_url()."administrador/usuarios");
        }
        else {
            $this->session->flashdata("error", "No se pudo guardar la informacion");
            redirect(base_url()."admonistrador/usuarios/add");
        }
    }

    public function view(){
        $idusuario = $this->input->post("idusuario");
        $data = array (
            "usuario" => $this->Usuarios_model->getUsuario($idusuario)
        );
        $this->load->view("admin/usuarios/view",$data);
    }

    public function edit($id){
        $data = array(
            'roles' => $this->Usuarios_model->getRoles(),
            'usuario' => $this->Usuarios_model->getUsuario($id)
        );

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/usuarios/edit', $data);
		$this->load->view('layouts/footer');
    }

    public function update(){
        $idusuario = $this->input->post("idusuario");
        $nombres = $this->input->post("asesor_nombres");
        $apellidos = $this->input->post("asesor_apellidos");
        $cedula = $this->input->post("asesor_cedula");
        $telefono = $this->input->post("asesor_telefono");
        $email = $this->input->post("asesor_correo");
        $contraseña = $this->input->post("codigo_asesor");
        $rol = $this->input->post("rol");

        $this->form_validation->set_rules("asesor_cedula","asesor_cedula","required|is_unique[asesor.asesor_cedula]");
        
        $data = array(
            'asesor_nombres' =>$nombres,
            'asesor_apellidos' =>$apellidos,
            'asesor_cedula' =>$cedula,
            'asesor_telefono' =>$telefono,
            'asesor_correo' =>$email,
            'codigo_asesor' =>$contraseña,
            'rol_id' =>$rol,
        );

        if ($this->Usuarios_model->update($idusuario, $data)) {
            redirect(base_url()."administrador/usuarios");
        }
        else {
            $this->session->flashdata("error", "No se pudo guardar la informacion");
            redirect(base_url()."admonistrador/usuarios/edit/".$idusuario);
        }
    }

    public function delete ($id){
        $data = array(
            'estado' => "0",
        );

        $this->Usuarios_model->update($id, $data);
        echo "administrador/usuarios";
    }
       
    
}    