<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones_model extends CI_Model {
    
    public function getCot(){
        $this->db->where("estado", "1");
        $resultados = $this->db->get("cotizaciones");;
        return $resultados->result();
    }

    public function getCotizaciones()
    {
        $resultados = $this->db->get("cotizaciones");
        return $resultados->result();
    }

    public function getCotizacion($id){
        $this->db->where("cotizacion_id",$id);
        $resultado = $this->db->get("cotizaciones");
        return $resultado->row();
    }

    public function getProyectos($valor)
    {
        $this->db->select("proyecto_id, proyecto_nombre as label, cantidad_pisos, cantidad_aptos, descripcion");
        $this->db->from("proyecto");
        $this->db->like("proyecto_nombre", $valor);
        $resultados = $this->db->get();
        return $resultados->result_array();
    }

    public function save($data){
        return $this->db->insert("cotizaciones", $data);
    }

    public function getCotizacionesByDate($fechainicio, $fechafin){
        $this->db->where("fecha_creacion >=",$fechainicio);
        $this->db->where("fecha_creacion <=",$fechafin);
        $resultado = $this->db->get("cotizaciones");
        return $resultado->result();
    }


}