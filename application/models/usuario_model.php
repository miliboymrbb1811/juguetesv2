<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario_model extends CI_Model
{


    public function validar($login, $password)
    {
        $this->db->select('*'); //select *
        $this->db->FROM('usuario'); //tabla
        $this->db->where('login', $login);
        $this->db->where('password', $password);
        $this->db->where('estado', '1');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function listausuarios() //select
    {
        //muestra los usuarios habilitados 
        $this->db->select('usuario.idUsuario,usuario.foto,usuario.login,usuario.password,usuario.tipo,usuario.estado,usuario.fechaRegistro,usuario.fechaActualizacion,usuario.idEmpleado,
     persona.nombre,persona.primerApellido,persona.segundoApellido'); //select *
        $this->db->FROM('usuario'); //tabla productos
        $this->db->where('usuario.estado', '1'); //condición where estado = 1
        $this->db->JOIN('empleado', 'usuario.idEmpleado = empleado.idEmpleado');
        $this->db->JOIN('persona', 'persona.idPersona = empleado.idPersona');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function agregarusuarios($data) //create
    {
        $this->db->insert('usuario', $data); //tabla
    }

    public function eliminarusuarios($idusuario) //delete
    {
        $this->db->where('idUsuario', $idusuario); //condición where id
        $this->db->delete('usuario'); //tabla
    }

    public function recuperarusuarios($idusuario) //get
    {
        $this->db->select('usuario.idUsuario,usuario.foto,usuario.login,usuario.password,usuario.tipo,usuario.estado,usuario.fechaRegistro,usuario.fechaActualizacion,usuario.idEmpleado,persona.nombre,persona.primerApellido,persona.segundoApellido,persona.numeroCelular,persona.numeroCI'); //select *
        $this->db->FROM('usuario'); //tabla
        $this->db->where('idUsuario', $idusuario); //condición where id
        $this->db->JOIN('empleado', 'usuario.idEmpleado = empleado.idEmpleado');
        $this->db->JOIN('persona', 'persona.idPersona = empleado.idPersona');
        return $this->db->get(); //devolucion del resultado de la consulta
    }

    public function modificarusuarios($idusuario, $data) //update
    {
        $this->db->where('idUsuario', $idusuario);
        $this->db->update('usuario', $data);
    }

    public function  listausuariosdeshabilitados() //select
    {
        //muestra los usuarios deshabilitados 
        $this->db->select('usuario.idUsuario,usuario.foto,usuario.login,usuario.password,usuario.tipo
        ,usuario.estado,usuario.fechaRegistro,usuario.fechaActualizacion,usuario.idEmpleado
       ,persona.nombre,persona.primerApellido,persona.segundoApellido'); //select *
        $this->db->FROM('usuario'); //tabla productos
        $this->db->where('usuario.estado', '0'); //condición where estado = 1
        $this->db->JOIN('empleado', 'usuario.idEmpleado = empleado.idEmpleado');
        $this->db->JOIN('persona', 'persona.idPersona = empleado.idPersona');
        //si se gusta añadir una especie de AND de SQL se puede repetir nuevamente la línea previa a este comentario. ($this->db->where('estado','1');)
        return $this->db->get(); //devolucion del resultado de la consulta
    }
    public function validarusuario($usuario)
    {
        $this->db->select('login');
        $this->db->FROM('usuario');
        $this->db->where('login', $usuario);
        return $this->db->get();
    }

    public function validarcontrasena($contrasena)
    {
        $this->db->select('password');
        $this->db->FROM('usuario');
        $this->db->where('password', $contrasena);
        return $this->db->get();
    }
}
