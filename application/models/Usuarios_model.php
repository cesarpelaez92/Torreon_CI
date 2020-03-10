<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

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
}
