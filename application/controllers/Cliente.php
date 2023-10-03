<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Cliente extends CI_Controller
{

    public function index()
    {

        if ($this->session->userdata('tipo') == 'admin'|| $this->session->userdata('tipo') == 'vendedor') {
            $lista = $this->cliente_model->listaempleado();
            $data['cliente'] = $lista;


            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('cliente/cliente_lista_read', $data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');

            /*$this->load->view('inc/header');
        $this->load->view('lista_read',$data);
        $this->load->view('inc/footer');*/
        } else {
            redirect('usuarios/panel', 'refresh');
        }
    }
    public function index2()
    {

        if ($this->session->userdata('tipo') == 'vendedor') {
            $lista = $this->cliente_model->listaempleado();
            $data['cliente'] = $lista;


            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('cliente/clienteVendedor/cliente_lista_read', $data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');

            /*$this->load->view('inc/header');
        $this->load->view('lista_read',$data);
        $this->load->view('inc/footer');*/
        } else {
            redirect('usuarios/panel', 'refresh');
        }
    }


    public function agregar()
    {

        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('cliente/cliente_formulario_insert',);
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
            'Nombre del cliente',
            'required|min_length[3]|max_length[30]',
            array(
                'required' => 'Se requiere ingresar el nombre del cliente.',
                'min_length' => 'El nombre debe tener al menos 3 caracteres.',
                'max_length' => '¡El nombre no debe contener más de 30 caracteres!.'
            )
        );
        $this->form_validation->set_rules(
            'primerapellido',
            'Primer apellido del cliente',
            'required|min_length[3]|max_length[50]',
            array(
                'required' => 'Se requiere ingresar el primer apellido del cliente.',
                'min_length' => 'El apellido debe tener al menos 3 caracteres.',
                'max_length' => '¡El apellido no debe contener más de 50 caracteres!.',
               
            )
        );
        $this->form_validation->set_rules(
            'numeroci',
            'Número de Carnet del cliente',
            'min_length[6]|max_length[8]|is_natural|required',
            array(
                'required' => 'Se requiere ingresar el primer apellido del cliente.',
                'min_length' => '¡Ingrese un número de carnet válido!.',
                'max_length' => '¡El número de carnet no debe contener más de 8 caracteres!.',
                'is_natural' => '¡No ingrese caracteres que no sean números!.'
            )
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('cliente/cliente_formulario_insert',);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        } else {
            $data['nombre'] = mb_strtoupper($_POST['nombre']);
            $data['primerApellido'] = mb_strtoupper($_POST['primerapellido']);
            $data['segundoApellido'] = mb_strtoupper($_POST['segundoapellido']);
            $data['numeroCelular'] = $_POST['numerocelular'];
            $data['numeroCI'] = $_POST['numeroci'];
            $idPersona = $this->Persona_model->agregarpersona($data);

            $datos['idPersona'] = $idPersona;

            $this->cliente_model->agregarcliente($datos);
            redirect('cliente/index', 'refresh');
        }
    }
    public function agregarbd2()
    {

            $data['nombre'] = mb_strtoupper($_POST['nombre']);
            $data['primerApellido'] = mb_strtoupper($_POST['primerapellido']);
            $data['segundoApellido'] = mb_strtoupper($_POST['segundoapellido']);
            $data['numeroCelular'] = $_POST['numerocelular'];
            $data['numeroCI'] = $_POST['numeroci'];
            $idPersona = $this->Persona_model->agregarpersona($data);

            $datos['idPersona'] = $idPersona;

            $this->cliente_model->agregarcliente($datos);
            redirect('venta/vistaAgregarVenta', 'refresh');
        
    }

    public function eliminarbd()
    {
        $idcliente = $_POST['idcliente'];
        $this->cliente_model->eliminarempleado($idcliente);
        redirect('cliente/index', 'refresh');
    }
    public function modificar()
    {
        $idcliente = $_POST['idcliente'];
        $data['infocliente'] = $this->cliente_model->recuperarempleado($idcliente);
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('cliente/cliente_formulario_update', $data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
    }

    public function modificarbd()
    {
        $idcliente=$_POST['idpersona'];
        $data['nombre']=mb_strtoupper($_POST['nombre']);
        $data['primerApellido']=mb_strtoupper($_POST['primerapellido']);
        $data['segundoApellido']=mb_strtoupper($_POST['segundoapellido']);
        $data['numeroCelular']=$_POST['numerocelular'];
        $data['numeroCI']=$_POST['numeroci'];
        $data['fechaActualizacion']=date('Y-m-d H:i:s');
        $this->cliente_model->modificarPersona($idcliente,$data);
        redirect('cliente/index', 'refresh');
    }

    public function deshabilitarbd($idcliente)
    {

        $data['estado'] = '0';
        $this->cliente_model->modificarcliente($idcliente, $data);
        redirect('cliente/index', 'refresh');
    }

    public function deshabilitados()
    {

        if ($this->session->userdata('tipo') == 'admin') {
            $lista = $this->cliente_model->listaempleadodeshabilitados();
            $data['cliente'] = $lista;


            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('cliente/cliente_listadeshabilitados_read', $data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        } else if ($this->session->userdata('tipo') == 'vendedor') {
            $lista = $this->cliente_model->listaempleadodeshabilitados();
            $data['cliente'] = $lista;


            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('cliente/clienteVendedor/cliente_listadeshabilitados_read', $data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
    }

    public function habilitarbd()
    {
        $idcliente = $_POST['idcliente'];
        $data['estado'] = '1';
        $this->cliente_model->modificarcliente($idcliente, $data);
        redirect('cliente/deshabilitados', 'refresh');
    }
}
