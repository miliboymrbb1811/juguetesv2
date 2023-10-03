<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Empleado extends CI_Controller {

	public function index()
	{

        if($this->session->userdata('tipo')=='admin')
        {
        $lista=$this->empleado_model->listaempleado();
        $data['empleado']=$lista;

        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('empleado/empleado_lista_read',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');

        /*$this->load->view('inc/header');
        $this->load->view('lista_read',$data);
        $this->load->view('inc/footer');*/
        }
        else
        {
            redirect('usuarios/panel','refresh');
        }
		
	}
        public function agregar()
	{
      
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('empleado/empleado_formulario_insert',);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
		
	}

        public function agregarbd()
    {
        $this->load->library('form_validation');

        //atributo, 
        //Alias(ponle cualquier wea),
        //atributos de control, array -> asignar mensajes empleadolizados al atributo de control.
        $this->form_validation->set_rules(
            'nombre',
            'Nombre del empleado',
            'required|min_length[4]|max_length[30]',
            array('required'=>'Se requiere ingresar el nombre del empleado.',
                'min_length'=>'El nombre debe tener al menos 4 caracteres.',
                'max_length'=>'¡El nombre no debe contener más de 30 caracteres!.'
                )
            );
        $this->form_validation->set_rules(
            'primerapellido',
            'Primer apellido del empleado',
            'required|min_length[4]|max_length[30]|alpha',
            array('required'=>'Se requiere ingresar el primer apellido del empleado.',
                'min_length'=>'El apellido debe tener al menos 4 caracteres.',
                'max_length'=>'¡El apellido no debe contener más de 30 caracteres!.',
                'alpha'=>'¡El apellido solo debe contener letras!.'
                )
            );
        $this->form_validation->set_rules(
            'segundoapellido',
            'Segundo apellido del empleado',
            'min_length[4]|max_length[30]|alpha',
            array('min_length'=>'El apellido debe tener al menos 4 caracteres.',
                'max_length'=>'¡El apellido no debe contener más de 30 caracteres!.',
                'alpha'=>'¡El apellido solo debe contener letras!.'
                )
            );
        $this->form_validation->set_rules(
            'numerocelular',
            'Número de Celular del empleado',
            'exact_length[8]|is_natural',
            array('exact_length'=>'¡Ingrese un número de celular válido!.',
                'is_natural'=>'¡No ingrese caracteres que no sean números!.'
                )
            );
        $this->form_validation->set_rules(
            'numeroci',
            'Número de Carnet del empleado',
            'min_length[6]|max_length[8]|is_natural',
            array('min_length'=>'¡Ingrese un número de carnet válido!.',
                'max_length'=>'¡El número de carnet no debe contener más de 8 caracteres!.',
                'is_natural'=>'¡No ingrese caracteres que no sean números!.'
                )
            );

        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('empleado/empleado_formulario_insert',);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else
        {
            $data['nombre']=mb_strtoupper($_POST['nombre']);
            $data['primerApellido']=mb_strtoupper($_POST['primerapellido']);
            $data['segundoApellido']=mb_strtoupper($_POST['segundoapellido']);
            $data['numeroCelular']=$_POST['numerocelular'];
            $data['numeroCI']=$_POST['numeroci'];
            $idPersona = $this->Persona_model->agregarPersona($data);
            $datos['idPersona']= $idPersona;

            $this->empleado_model->agregarEmpleado($datos);
            redirect('empleado/index','refresh');
        }

        
        
    }

        public function eliminarbd()
    {
        $idempleado=$_POST['idempleado'];
        $this->empleado_model->eliminarempleado($idempleado);
        redirect('empleado/index','refresh');
        
    }
        public function modificar()
    {
        $idempleado=$_POST['idempleado'];
        //$idpersona=$_POST['idpersona'];
        $data['infoempleado']=$this->empleado_model->recuperarempleado($idempleado);
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('empleado/empleado_formulario_update',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
    }

        public function modificarbd()
    {
        $idempleado=$_POST['idpersona'];
        $data['nombre']=mb_strtoupper($_POST['nombre']);
        $data['primerApellido']=mb_strtoupper($_POST['primerapellido']);
        $data['segundoApellido']=mb_strtoupper($_POST['segundoapellido']);
        $data['numeroCelular']=$_POST['numerocelular'];
        $data['numeroCI']=$_POST['numeroci'];
        $data['fechaActualizacion']=date('Y-m-d H:i:s');
        $this->empleado_model->modificarPersona($idempleado,$data);

        redirect('empleado/index','refresh');
       
    }

        public function deshabilitarbd( $idEmpleado)
    {
       
        $data['estado']='0';

        $this->empleado_model->modificarempleadoestado($idEmpleado,$data);
        redirect('empleado/index','refresh');
    }

        public function deshabilitados()
    {
        $lista=$this->empleado_model->listaempleadodeshabilitados();
        $data['empleado']=$lista;


        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('empleado/empleado_listadeshabilitados_read',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
        
    }

        public function habilitarbd()
    {
        $idempleado=$_POST['idempleado'];
        $data['estado']='1';

        $this->empleado_model->modificarempleadoestado($idempleado,$data);
        redirect('empleado/deshabilitados','refresh');
    }

  }
