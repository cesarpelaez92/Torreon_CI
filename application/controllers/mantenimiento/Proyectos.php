<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("Proyectos_model");
    }


	public function index()
	{
        $data = array(
            'proyectos' => $this->Proyectos_model->getProyectos(),
        );

		$this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/proyectos/list', $data);
		$this->load->view('layouts/footer');
    }
    
    public function add(){
        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/proyectos/add');
		$this->load->view('layouts/footer');
    }

    public function store(){
        $id = $this->input->post("proyecto_id");
        $nombre = $this->input->post("proyecto_nombre");
        $pisos = $this->input->post("cantidad_pisos");
        $aptos = $this->input->post("cantidad_aptos");
        $descripcion = $this->input->post("descripcion");
        
        $this->form_validation->set_rules("proyecto_nombre","proyecto_nombre","required|is_unique[proyecto.proyecto_nombre]");

        if ($this->form_validation->run()){
            $data = array(
                'proyecto_id' =>$id,
                'proyecto_nombre' =>$nombre,
                'cantidad_pisos' =>$pisos,
                'cantidad_aptos' =>$aptos,
                'descripcion' =>$descripcion,
                'estado' => "1",
            );
    
            if ($this->Proyectos_model->save($data)) {
                    redirect(base_url()."mantenimiento/proyectos");
            }
            else {
                $this->session->flashdata("error", "No se pudo guardar la informacion");
                redirect(base_url()."mantenimiento/proyectos/add");
            } 
        }else{
            $this->add();
        }

       
    }

    public function edit($id){
        $data = array(
            'proyecto' => $this->Proyectos_model->getProyectosById($id),
        );
        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/proyectos/edit', $data);
		$this->load->view('layouts/footer');
    }

    public function update(){
        $idProyecto = $this->input->post("IdProyecto");
        $id = $this->input->post("proyecto_id");
        $nombre = $this->input->post("proyecto_nombre");
        $pisos = $this->input->post("cantidad_pisos");
        $aptos = $this->input->post("cantidad_aptos");
        $descripcion = $this->input->post("descripcion");

        $categoriaActual = $this->Proyectos_model->getProyectosById($idProyecto);
        
        if ($nombre == $categoriaActual->proyecto_nombre) {
            $unique = "";
        }else{
            $unique = '|is_unique[proyecto.proyecto_nombre]';
        }

        $this->form_validation->set_rules("proyecto_nombre","proyecto_nombre","required".$unique);

        if ($this->form_validation->run()) {
            $data = array (
                'proyecto_id' =>$id,
                'proyecto_nombre' =>$nombre,
                'cantidad_pisos' =>$pisos,
                'cantidad_aptos' =>$aptos,
                'descripcion' =>$descripcion,
               );

            if ($this->Proyectos_model->update($idProyecto, $data)) {
                redirect(base_url()."mantenimiento/proyectos");
            }else{
                $this->session->flashdata("error", "No se pudo actualizar la informacion");
                redirect(base_url()."mantenimiento/proyectos/edit/".$idProyecto);
            }
        }else{
            $this->edit($idProyecto);
        }
    }

    public function view ($id){
        $data = array(
            'proyecto' => $this->Proyectos_model->getProyectosById($id),
        );
        $this->load->view("admin/proyectos/view",$data);
    }

    public function delete ($id){
        $data = array(
            'estado' => "0",
        );

        $this->Proyectos_model->update($id, $data);
        echo "mantenimiento/proyectos";
    }
}
