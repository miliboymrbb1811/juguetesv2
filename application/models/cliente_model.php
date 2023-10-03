<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {


	public function listaempleado()//select
	{
        $this->db->select('idCliente, persona.nombre, persona.primerApellido, persona.segundoApellido, numeroCelular, numeroCI, cliente.estado, persona.fechaRegistro, persona.fechaActualizacion'); //select *
        $this->db->FROM('cliente'); //tabla productos
        $this->db->where('cliente.estado','1'); //condición where estado = 1
        $this->db->JOIN('persona', 'persona.idpersona = cliente.idpersona');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
	}

    public function agregarcliente($data)//create
    {
        $this->db->insert('cliente',$data); //tabla
    }

    public function eliminarempleado($idcliente)//delete
    {
        $this->db->where('idcliente',$idcliente); //condición where id
        $this->db->delete('cliente'); //tabla
    }

    public function recuperarempleado($idcliente)//get
    {
        $this->db->select('cliente.idCliente,cliente.idPersona, persona.nombre, persona.primerApellido, persona.segundoApellido, persona.numeroCelular, persona.numeroCI, cliente.estado, persona.fechaRegistro, persona.fechaActualizacion'); //select *
        $this->db->FROM('cliente'); //tabla
        $this->db->where('cliente.idCliente',$idcliente); 
        $this->db->JOIN('persona ','persona.idpersona = cliente.idpersona');

       //condición where id
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public functiON modificarPersona($idcliente,$data)//update
    {     
        $this->db->where('idPersona',$idcliente);
        $this->db->update('persona',$data);

    }

    public function modificarcliente($idcliente,$data)//update
    {
        $this->db->where('idcliente',$idcliente);
        $this->db->update('cliente',$data);
    }

    public function listaempleadodeshabilitados()//select
    {
        $this->db->select('idCliente, persona.nombre, persona.primerApellido, persona.segundoApellido, numeroCelular, numeroCI, cliente.estado, persona.fechaRegistro, persona.fechaActualizacion'); //select *
        $this->db->FROM('cliente'); //tabla productos
        $this->db->where('cliente.estado','0'); //condición where estado = 1
        $this->db->JOIN('persona', 'persona.idpersona = cliente.idpersona');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
    }


    public function getClients($postData){
        // $postData['search'] = 7;
        $response2 = array();
        if(isset($postData['search']) ){
          // Select record
          $this->db->select('*');
          $this->db->FROM('bddjuguetes.persona'); //tabla productos
          $this->db->JOIN('bddjuguetes.cliente ', 'cliente.idPersona = persona.idPersona');
          $this->db->where("persona.numeroCI like '%".$postData['search']."%' ");
          $this->db->where('cliente.estado','1'); //condición where estado = 1
        
          $records = $this->db->get()->result();
   
          foreach($records as $row ){
             $response2[] = array("value"=>$row->numeroCI,"idPersona"=>$row->idCliente,"primerApellido"=>$row->primerApellido
             ,"segundoApellido"=>$row->segundoApellido,"nombre"=>$row->nombre);
            }
   
        }
        return $response2;
     }


}
