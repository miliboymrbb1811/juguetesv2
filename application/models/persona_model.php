<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona_model extends CI_Model {


    public function agregarpersona($data)//create
    {
        $this->db->insert('persona',$data); //tabla
        return $this->db->insert_id();

    }

    public function modificarpersona($idempleado,$data)//update
    {
        $this->db->where('idempleado',$idempleado);
        $this->db->update('persona',$data);
    }

    public function modificaridempleado($idEmpleado,$base)
	{
		$this->db->where('idEmpleado',$idEmpleado); 
		$this->db->update('empleado',$base);
	}

    
}