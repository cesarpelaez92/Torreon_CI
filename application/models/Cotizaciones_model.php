<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cotizaciones_model extends CI_Model {
    
    public function getCot(){
        $this->db->select("c.*, cl.cliente_nombres, a.asesor_nombres, p.proyecto_nombre"); //p.proyecto_nombre
        $this->db->from("cotizaciones c");
        $this->db->join("clientes cl","c.codigo_cliente = cl.codigo_cliente");
        $this->db->join("asesor a","c.asesor_cedula = a.asesor_cedula");
        $this->db->join("proyecto p", "c.proyecto_id = p.proyecto_id");
        $resultados = $this->db->get();

        if ($resultados->num_rows()>0) {
            return $resultados->result();
        }else{
            return false;
        }

    }

    public function getCotizaciones()
    {
        $resultados = $this->db->get("cotizaciones");
        return $resultados->result();
    }

    public function getCotizacion($id){
        $this->db->select("c.*, cl.cliente_nombres,cl.cliente_cedula, cl.cliente_apellido, cl.telefono, a.asesor_nombres, p.proyecto_nombre");
        $this->db->from("cotizaciones c");
        $this->db->join("clientes cl","c.codigo_cliente = cl.codigo_cliente");
        $this->db->join("asesor a","c.asesor_cedula = a.asesor_cedula");
        $this->db->join("proyecto p", "c.proyecto_id = p.proyecto_id");
        $this->db->where("c.cotizacion_id",$id);
        $resultado = $this->db->get();
        return $resultado ->row();
    }

    public function getProyectos($valor)
    {
        $this->db->select("proyecto_id, proyecto_nombre as label, cantidad_pisos, cantidad_aptos, descripcion, valor");
        $this->db->from("proyecto");
        $this->db->like("proyecto_nombre", $valor);
        $resultados = $this->db->get();
        return $resultados->result_array();
    }

    public function save($data){
        return $this->db->insert("cotizaciones", $data);
    }

    public function getCotizacionesByDate($fechainicio, $fechafin){
        
        $this->db->select("c.*, cl.cliente_nombres, a.asesor_nombres, p.proyecto_nombre"); //p.proyecto_nombre
        $this->db->from("cotizaciones c");
        $this->db->join("clientes cl","c.codigo_cliente = cl.codigo_cliente");
        $this->db->join("asesor a","c.asesor_cedula = a.asesor_cedula");
        $this->db->join("proyecto p", "c.proyecto_id = p.proyecto_id");
        $this->db->where("fecha_creacion >=",$fechainicio);
        $this->db->where("fecha_creacion <=",$fechafin);
        $resultado = $this->db->get();
        return $resultado->result();
    }


}