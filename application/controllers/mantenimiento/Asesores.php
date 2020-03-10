<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asesores extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("Asesores_model");
    }

    public function index()
	{
        $data = array(
            'asesores' => $this->Asesores_model->getAsesores(),
        );

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/asesores/list', $data);
		$this->load->view('layouts/footer');
    }

    public function add(){
        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/asesores/add');
		$this->load->view('layouts/footer');
    }

    public function store(){
        $nombres = $this->input->post("asesor_nombres");
        $apellidos = $this->input->post("asesor_apellidos");
        $cedula = $this->input->post("asesor_cedula");
        $telefono = $this->input->post("asesor_telefono");
        $email = $this->input->post("asesor_correo");
        $contraseña = $this->input->post("codigo_asesor");

        $this->form_validation->set_rules("asesor_cedula","asesor_cedula","required|is_unique[asesor.asesor_cedula]");
        
        if ($this->form_validation->run()) {
            $data = array(
                'asesor_nombres' =>$nombres,
                'asesor_apellidos' =>$apellidos,
                'asesor_cedula' =>$cedula,
                'asesor_telefono' =>$telefono,
                'asesor_correo' =>$email,
                'codigo_asesor' =>$contraseña,
                'estado' => "1",
            );

            if ($this->Asesores_model->save($data)) {
                redirect(base_url()."mantenimiento/asesores");
            }
            else {
                $this->session->flashdata("error", "No se pudo guardar la informacion");
                redirect(base_url()."mantenimiento/asesores/add");
            }
        }else{
            $this->add();
        }
    }

    public function edit($id){
        $data = array(
            'asesor' => $this->Asesores_model->getAsesorById($id),
        );
        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/asesores/edit', $data);
		$this->load->view('layouts/footer');
    }
    
    public function update(){
        
        $codigo_asesor = $this->input->post("codigo_asesor");
        $nombres = $this->input->post("asesor_nombres");
        $apellidos = $this->input->post("asesor_apellidos");
        $cedula = $this->input->post("asesor_cedula");
        $telefono = $this->input->post("asesor_telefono");
        $email = $this->input->post("asesor_correo");

        $asesorActual = $this->Asesores_model->getAsesorById($codigo_asesor);
        
        if ($cedula == $asesorActual->asesor_cedula) {
            $unique = "";
        }else{
            $unique = '|is_unique[asesor.asesor_cedula]';
        }

        $this->form_validation->set_rules("asesor_cedula","asesor_cedula","required".$unique);

        if ($this->form_validation->run()) {
            $data = array(
                'asesor_nombres' =>$nombres,
                'asesor_apellidos' =>$apellidos,
                'asesor_cedula' =>$cedula,
                'asesor_telefono' =>$telefono,
                'asesor_correo' =>$email,
            );
    
            if ($this->Asesores_model->update($codigo_asesor, $data)) {
                redirect(base_url()."mantenimiento/asesores");
            }else{
                $this->session->flashdata("error", "No se pudo actualizar la informacion");
                redirect(base_url()."mantenimiento/asesores/edit/".$idAsesor);
            }
        }else{
            $this->edit($codigo_asesor);
        }
    }

    public function delete ($id){
        $data = array(
            'estado' => "0",
        );

        $this->Asesores_model->update($id, $data);
        echo "mantenimiento/asesores";
    }
}