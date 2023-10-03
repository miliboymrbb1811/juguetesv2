<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Producto extends CI_Controller
{

    public function index()
    {

        if ($this->session->userdata('tipo') == 'admin') {
            $lista = $this->producto_model->listaproductos();
            $data['producto'] = $lista;

            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('producto/producto_lista_read', $data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        } else {
            redirect('usuarios/panel', 'refresh');
        }
    }
    public function index2()
    {

        if ($this->session->userdata('tipo') == 'vendedor') {
            $lista = $this->producto_model->listaproductos();
            $data['producto'] = $lista;

            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('producto/productoVendedor/producto_lista_read', $data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        } else {
            redirect('usuarios/panel', 'refresh');
        }
    }

    public function agregar()
    {

        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('producto/producto_formulario_insert',);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
    }

    public function agregarbd()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules(
            'precio',
            'Precio del producto',
            'required|max_length[7]|numeric',
            array(
                'required' => 'Se requiere ingresar el precio del producto.',
                'max_length' => '¡El precio no debe contener más de 7 caracteres!.',
                'numeric' => 'El precio solo debe contener números!.'
            )
        );
        $this->form_validation->set_rules(
            'codigo',
            'codigo del producto',
            'required|min_length[3]|max_length[20]|alpha_numeric_spaces',
            array(
                'required' => 'Se requiere ingresar el codigo del producto.',
                'min_length' => 'El codigo debe tener al menos 3 caracteres.',
                'max_length' => '¡El codigo no debe contener más de 20 caracteres!.',
                'alpha_numeric_spaces' => '¡El codigo solo debe contener letras!.'
            )
        );
        $this->form_validation->set_rules(
            'stock',
            'Stock del producto',
            'required|max_length[3]|is_natural',
            array(
                'required' => 'Se requiere ingresar el stock del producto.',
                'max_length' => '¡El stock no puede exceder más de 999 unidades!.',
                'is_natural' => '¡El stock solo debe contener números enteros!.'
            )
        );
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('producto/producto_formulario_insert',);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        } else {
            $nombreCompleto = $_FILES['archivoImagen']['name'];
            $config['upload_path']          = './uploads/products_images/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
     
            $config['max_width']            = 0;
            $config['max_height']           = 0;
            $config['mod_mime_fix']           = FALSE;
            $config['file_name'] = $nombreCompleto;
            $this->load->library('upload', $config);
    
            if(!$this->upload->do_upload('archivoImagen')) {
                
                $data['idMarca'] = $_POST['idmarca'];
                $data['idCategoria'] = $_POST['idcategoria'];
                $data['precio'] = $_POST['precio'];
                $data['codigo'] = mb_strtoupper($_POST['codigo']);
                $data['stock'] = $_POST['stock'];
                $data['descripcion'] = mb_strtoupper($_POST['descripcion']);
                $data['nombreProducto'] = mb_strtoupper($_POST['nombre']);
    
    
                $this->producto_model->agregarproductos($data);
                redirect('producto/index', 'refresh');
            } else {
                $data['idMarca'] = $_POST['idmarca'];
                $data['idCategoria'] = $_POST['idcategoria'];
                $data['precio'] = $_POST['precio'];
                $data['codigo'] = mb_strtoupper($_POST['codigo']);
                $data['stock'] = $_POST['stock'];
                $data['descripcion'] = mb_strtoupper($_POST['descripcion']);
                $data['nombreProducto'] = mb_strtoupper($_POST['nombre']);
    
                $data['foto'] = $nombreCompleto;
    
                $this->producto_model->agregarproductos($data);
                redirect('producto/index', 'refresh');
            }
        }
    }

    public function eliminarbd()
    {
        $idproducto = $_POST['idproducto'];
        $this->producto_model->eliminarproductos($idproducto);
        redirect('producto/index', 'refresh');
    }
    public function modificar()
    {
        $idproducto = $_POST['idproducto'];
        $data['infoproducto'] = $this->producto_model->recuperarproductos($idproducto);
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('producto/producto_formulario_update', $data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
    }
//formulario para aumental stop
    public function modificarCantidad()
    {
        $idproducto = $_POST['idproducto'];
        $data['infoproducto'] = $this->producto_model->recuperarproductos($idproducto);
        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('producto/producto_formulario_update_cantidad', $data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
    }
    public function modificarbdcantidad()
    {
      

        $idproducto = $_POST['idproducto'];

        
        $data['nombreProducto'] =mb_strtoupper($_POST['nombre']);
        $data['precio'] = $_POST['precio'];
        $data['codigo'] = mb_strtoupper($_POST['codigo']);
        $data['stock'] = $_POST['stock'];
        $data['descripcion'] = mb_strtoupper($_POST['descripcion']);
        $data['fechaActualizacion'] = date('Y-m-d H:i:s');

     
            // echo "No hay datos";
            $this->producto_model->modificarproductos($idproducto, $data);
                redirect('producto/index', 'refresh');
    

    }
    public function modificarbd()
    {
      

        $idproducto = $_POST['idproducto'];

        
        $data['nombreProducto'] =mb_strtoupper($_POST['nombre']);
        $data['idMarca'] = $_POST['idmarca'];
        $data['idCategoria'] = $_POST['idcategoria'];
        $data['precio'] = $_POST['precio'];
        $data['codigo'] = mb_strtoupper($_POST['codigo']);
        $data['stock'] = $_POST['stock'];
        $data['descripcion'] = mb_strtoupper($_POST['descripcion']);
        $data['fechaActualizacion'] = date('Y-m-d H:i:s');



        if ($_FILES['archivoImagen']['name'] != null) {
            // echo "Tiene datos La variable";
            $nombrearchivo = $_POST['nombreimagen'];
            $file = "uploads/products_images/". $nombrearchivo;
            if ($nombrearchivo) {
               // unlink($file);
            }
                // aqui se actualiza ambos una NUEVA foto y nueva/antigua descrip

                $config['upload_path']          = './uploads/products_images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_width']            = 0;
                $config['max_height']           = 0;
                $config['mod_mime_fix']           = FALSE;
                $this->load->library('upload', $config);

                 if ($this->upload->do_upload('archivoImagen')) {

                $data['foto'] = $_FILES['archivoImagen']['name'];
                $this->producto_model->modificarproductos($idproducto, $data);
                redirect('producto/index', 'refresh');
                 } else {
                    $data['titulo'] = 'Subir imagen | Error';
                    $data['error'] = array('error' => $this->upload->display_errors());
                    $this->load->view('errors/formulario_error',$data);
                 }

        } 
        else {
     
            // echo "No hay datos";
            $this->producto_model->modificarproductos($idproducto, $data);
                redirect('producto/index', 'refresh');
        }


    }

    public function deshabilitarbd($idproducto)
    {
        $data['estado'] = '0';
        $this->producto_model->modificarproductos($idproducto, $data);
        redirect('producto/index', 'refresh');
    }

    public function deshabilitados()
    {
        if ($this->session->userdata('tipo') == 'admin') {
            $lista = $this->producto_model->listaproductosdeshabilitados();
            $data['producto'] = $lista;


            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('producto/producto_listadeshabilitados_read', $data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
            
        } else  if ($this->session->userdata('tipo') == 'vendedor') {
            $lista = $this->producto_model->listaproductosdeshabilitados();
            $data['producto'] = $lista;


            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('producto/productoVendedor/producto_listadeshabilitados_read', $data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');
        }
    }

    public function habilitarbd()
    {
        $idproducto = $_POST['idproducto'];
        $data['estado'] = '1';
        $this->producto_model->modificarproductos($idproducto, $data);
        redirect('producto/deshabilitados', 'refresh');
    }
}
