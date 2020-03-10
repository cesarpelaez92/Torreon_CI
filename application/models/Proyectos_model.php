<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proyectos_model extends CI_Model {

	public function getProyectos(){
        $this->db->where("estado", "1");
        $resultados = $this->db->get("proyecto");;
        return $resultados->result();
    }

    public function save($data){
        return $this->db->insert("proyecto", $data);
    }

    public function getProyectosById($id){
        $this->db->where("proyecto_id",$id);
        $resultado = $this->db->get("proyecto");
        return $resultado->row();
    }

    public function update($id, $data){
        $this->db->where("proyecto_id", $id);
        return $this->db->update("proyecto", $data);
    }
}
