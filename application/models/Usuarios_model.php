<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    public function getUsuarios(){
        $this->db->select("a.*,r.nombre as rol");
        $this->db->from("asesor a");
        $this->db->join("roles r", "a.rol_id = r.id");
        $this->db->where("a.estado", "1");
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function getUsuario($id){
        $this->db->select("a.*,r.nombre as rol");
        $this->db->from("asesor a");
        $this->db->join("roles r", "a.rol_id = r.id");
        $this->db->where("a.asesor_cedula", $id);
        $this->db->where("a.estado", "1");
        $resultado = $this->db->get();
        return $resultado->row();
    }

    public function getRoles(){
        $resultados = $this->db->get("roles");
        return $resultados->result();
    }

    public function save($data){
        return $this->db->insert("asesor", $data);
    }

	public function login($userEmail, $userPassword)
	{
        $this->db->where("asesor_correo", $userEmail);
        $this->db->where("codigo_asesor", $userPassword);

        $resultados = $this->db->get('asesor');
        console.log($resultado);

        if ($resultados->num_rows()>0) {
            return $resultados->row();
        }
        else{
            return false;
        }
    }

    public function update($id, $data){
        $this->db->where("asesor_cedula", $id);
        return $this->db->update("asesor", $data);
    }
    
    
}
