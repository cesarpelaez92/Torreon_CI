<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("Clientes_model");
    }

    public function index()
	{
        $data = array(
            'clientes' => $this->Clientes_model->getClientes(),
        );

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/clientes/list', $data);
		$this->load->view('layouts/footer');
    }

    public function add(){
        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/clientes/add');
		$this->load->view('layouts/footer');
    }

    public function store(){
        $nombres = $this->input->post("cliente_nombres");
        $apellidos = $this->input->post("cliente_apellido");
        $cedula = $this->input->post("cliente_cedula");
        $telefono = $this->input->post("telefono");
        $email = $this->input->post("email");

        $this->form_validation->set_rules("cliente_cedula","cliente_cedula","required|is_unique[clientes.cliente_cedula]");

        if ($this->form_validation->run()) {
            $data = array(
                'cliente_nombres' =>$nombres,
                'cliente_apellido' =>$apellidos,
                'cliente_cedula' =>$cedula,
                'telefono' =>$telefono,
                'email' =>$email,
                'estado' => "1",
            );
    
            if ($this->Clientes_model->save($data)) {
                    redirect(base_url()."mantenimiento/clientes");
            }
            else {
                $this->session->flashdata("error", "No se pudo guardar la informacion");
                redirect(base_url()."mantenimiento/clientes/add");
            } 
        }else{
            $this->add();
        }
        
    }

    public function edit($id){
        $data = array(
            'cliente' => $this->Clientes_model->getClienteById($id),
        );
        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/clientes/edit', $data);
		$this->load->view('layouts/footer');
    }
    
    public function update(){
        
        $codigo_cliente = $this->input->post("codigo_cliente");
        $nombres = $this->input->post("cliente_nombres");
        $apellidos = $this->input->post("cliente_apellido");
        $cedula = $this->input->post("cliente_cedula");
        $telefono = $this->input->post("telefono");
        $email = $this->input->post("email");

        $clienteActual = $this->Clientes_model->getClienteById($codigo_cliente);
        
        if ($cedula == $clienteActual->cliente_cedula) {
            $unique = "";
        }else{
            $unique = '|is_unique[clientes.cliente_cedula]';
        }

        $this->form_validation->set_rules("cliente_cedula", "cliente_cedula", "required".$unique);

        if ($this->form_validation->run()) {
            $data = array(
                'cliente_nombres' =>$nombres,
                'cliente_apellido' =>$apellidos,
                'cliente_cedula' =>$cedula,
                'telefono' =>$telefono,
                'email' =>$email,
            );
    
            if ($this->Clientes_model->update($codigo_cliente, $data)) {
                redirect(base_url()."mantenimiento/clientes");
            }else{
                $this->session->flashdata("error", "No se pudo actualizar la informacion");
                redirect(base_url()."mantenimiento/clientes/edit/".$idProyecto);
            } 
        }else{
            $this->edit($codigo_cliente);
        }
    }

    public function delete ($id){
        $data = array(
            'estado' => "0",
        );

        $this->Clientes_model->update($id, $data);
        echo "mantenimiento/clientes";
    }
}