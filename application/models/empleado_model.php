<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado_model extends CI_Model {


	public function listaempleado()//select
	{


        $this->db->select('idEmpleado , persona.nombre, persona.primerApellido, persona.segundoApellido, numeroCelular, numeroCI, empleado.estado, persona.fechaRegistro, persona.fechaActualizacion'); //select *
        $this->db->FROM('empleado'); //tabla productos
        $this->db->where('empleado.estado','1'); //condición where estado = 1
        $this->db->or_where('empleado.estado','2');
        $this->db->JOIN('persona ', 'persona.idpersona = empleado.idpersona');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta


	}

    public function agregarempleado($data)//create
    {
        $this->db->insert('empleado',$data); //tabla
    }


    public function eliminarempleado($idempleado)//delete
    {
        $this->db->where('idempleado',$idempleado); //condición where id
        $this->db->delete('empleado'); //tabla
    }

    public function recuperarempleado($idempleado)//get
    {
        $this->db->select('empleado.idEmpleado,empleado.idPersona, persona.nombre, persona.primerApellido, persona.segundoApellido, persona.numeroCelular, persona.numeroCI, empleado.estado, persona.fechaRegistro, persona.fechaActualizacion'); //select *
        $this->db->FROM('empleado'); //tabla
        $this->db->where('empleado.idEmpleado',$idempleado); 
        $this->db->JOIN('persona ','persona.idpersona = empleado.idpersona');
       //condición where id
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public functiON modificarPersona($idempleado,$data)//update
    {     
        $this->db->where('idPersona',$idempleado);
        $this->db->update('persona',$data);

    }
    public functiON modificarEmpleado($idPersona,$data)//update
    {     
        $this->db->where('idPersona',$idPersona);
        $this->db->update('empleado',$data);

    }
    public functiON modificarempleadoestado($idempleado,$data)//update
    {     
        $this->db->where('idempleado',$idempleado);
        $this->db->update('empleado',$data);

    }


    public function listaempleadodeshabilitados()//select
    {
        $this->db->select('idEmpleado , persona.nombre, persona.primerApellido, persona.segundoApellido, numeroCelular, numeroCI, empleado.estado, persona.fechaRegistro, persona.fechaActualizacion '); //select *
        $this->db->FROM('empleado'); //tabla productos
        $this->db->where('empleado.estado','0'); //condición where estado = 1
        $this->db->JOIN('persona ', 'persona.idpersona = empleado.idpersona');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
    }

}
