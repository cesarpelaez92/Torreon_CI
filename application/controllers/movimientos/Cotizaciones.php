<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones extends CI_Controller {
    
    private $permisos;
    public function __construct(){
        
        parent::__construct();
        $this->load->model("Cotizaciones_model");
        $this->load->model("Clientes_model");
        $this->load->model("Asesores_model");
        $this->permisos = $this->backend_lib->control();
    }

    public function index(){
        $data = array(
            'permisos' => $this->permisos,
            'cotizaciones' => $this->Cotizaciones_model->getCot(),
        );
        $this->load->view('layouts/header');
		$this->load->view('layouts/aside');
		$this->load->view('admin/cotizaciones/list', $data);
		$this->load->view('layouts/footer');
    }
    

    public function add(){
            $data = array(
                "cotizacion" => $this->Cotizaciones_model->getCotizaciones(), 
                "clientes" => $this->Clientes_model->getClientes(),
                "asesores" => $this->Asesores_model->getAsesores()
            );

            $this->load->view('layouts/header');
            $this->load->view('layouts/aside');
            $this->load->view("admin/cotizaciones/add", $data);
            $this->load->view('layouts/footer');
    }

    public function getproyectos(){
        $valor = $this->input->post("valor");
        $clientes = $this->Cotizaciones_model->getProyectos($valor);
        echo json_encode($clientes);
    }

    public function store(){
        $cliente = $this->input->post("idcliente");
        $asesor = $this->session->userdata("id");
        $fecha = $this->input->post("fecha");
        $proyecto = $this->input->post("proyecto");
        $piso = $this->input->post("piso");
        $apto = $this->input->post("apto");
        $valor = $this->input->post("valor");
        $descripcionApto = $this->input->post("descripcionApto");

        $data = array(
            'asesor_cedula'=> $asesor,
            'fecha_creacion'=> $fecha,
            'valor'=> $valor,
            'codigo_cliente'=> $cliente,
            'descripcion'=> $descripcionApto,
            'proyecto_id'=> $proyecto,
            'piso'=> $piso,
            'apartamento_id'=> $apto,
        );

        if ($this->Cotizaciones_model->save($data)) {
            redirect(base_url()."movimientos/cotizaciones");
        }else{
            redirect(base_url()."movimientos/cotizaciones/add");
        }
    }

    public function view(){
        $idventa = $this->input->post("id");
        $data = array(
            "cotizacion" => $this->Cotizaciones_model->getCotizacion($idventa),
            
        );
        $this->load->view("admin/cotizaciones/view", $data);
    }

}