<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categoria extends CI_Controller {

	public function index()
	{

        if($this->session->userdata('tipo')=='admin')
        {
            $lista=$this->categoria_model->listacategoria();
            $data['categoria']=$lista;
            $listadeshabilitados=$this->categoria_model->listacategoriadeshabilitados();
            $data['categoriadeshabilitados']=$listadeshabilitados;

            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('producto/categoria_lista_read',$data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
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
        $this->load->view('producto/categoria_formulario_insert',);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
	}

    public function agregarbd()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules(
            'nombrecategoria',
            'Nombre de Categoria',
            'required',//|alpha  hace que solo se pueda ingresar palablas completas sin espacio
            array(
                'required'=>'Se requiere ingresar el numero de categoría del producto.',
                )
            );
        if($this->form_validation->run()==FALSE)
        {
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('producto/categoria_formulario_insert',);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
        else{
            $data['numeroCategoria']=strtoupper($_POST['nombrecategoria']);
            $this->categoria_model->agregarcategoria($data);
            redirect('categoria/index','refresh');
        }
    }

        public function eliminarbd()
    {
        $idcategoria=$_POST['idcategoria'];
        $this->categoria_model->eliminarcategoria($idcategoria);
        redirect('categoria/index','refresh');
        
    }
        public function modificar()
    {
        $idcategoria=$_POST['idcategoria'];
        $data['infocategoria']=$this->categoria_model->recuperarcategoria($idcategoria);
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('producto/categoria_formulario_update',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
    }

        public function modificarbd()
    {
        $idcategoria=$_POST['idcategoria'];
        $data['numeroCategoria']=strtoupper($_POST['nombrecategoria']);
        $data['fechaActualizacion']=date('Y-m-d H:i:s');
        $this->categoria_model->modificarcategoria($idcategoria,$data);
        redirect('categoria/index','refresh');
    }

        public function deshabilitarbd($idcategoria)
    {
        
        $data['estado']='0';
        $this->categoria_model->modificarcategoria($idcategoria,$data);
        redirect('categoria/index','refresh');
    }

        public function habilitarbd()
    {
        $idcategoria=$_POST['idcategoria'];
        $data['estado']='1';
        $this->categoria_model->modificarcategoria($idcategoria,$data);
        redirect('categoria/index','refresh');
    }

    /*queda pendiente modificar esta funcion*/
    public function guest()
    {
        $lista=$this->categoria_model->listacategoria();
        $data['categoria']=$lista;
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('producto/producto_guest',$data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');        
    }

  }
