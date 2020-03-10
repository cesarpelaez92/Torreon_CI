<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asesores_model extends CI_Model {

	public function getAsesores(){
        $this->db->where("estado", "1");
        $resultados = $this->db->get("asesor");;
        return $resultados->result();
    }

    public function save($data){
        return $this->db->insert("asesor", $data);
    }

    public function getAsesorById($id){
        $this->db->where("codigo_asesor",$id);
        $resultado = $this->db->get("asesor");
        return $resultado->row();
    }
    
    public function update($id, $data){
        $this->db->where("codigo_asesor", $id);
        return $this->db->update("asesor", $data);
    }
}