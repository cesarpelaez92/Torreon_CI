<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model("Cotizaciones_model");
    }

    public function index(){
        $fechainicio = $this->input->post("fechainicio");
        $fechafin = $this->input->post("fechafin");
        if ($this->input->post("buscar")) {
            $cotizaciones = $this->Cotizaciones_model->getCotizacionesByDate($fechainicio, $fechafin);
        }
        else {
            $cotizaciones = $this->Cotizaciones_model->getCot();
        }
        $data = array(
            "cotizaciones" => $cotizaciones,
            "fechainicio" => $fechainicio,
            "fechafin" => $fechafin
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("admin/reportes/cotizaciones", $data);
        $this->load->view("layouts/footer");
    }
}