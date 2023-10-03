<?php
defined('BASEPATH') or exit('No direct script access allowed');

class usuarios extends CI_Controller
{


        public function index()
        {
                $data['msg'] = $this->uri->segment(3);
                if ($this->session->userdata('login')) {
                        //usuarios logueado
                        redirect('usuarios/panel', 'refresh');
                } else {
                        //usuarios no logueado
                        $this->load->view('login/vwheaderlogin');
                        $this->load->view('login/vwlogin', $data);
                        $this->load->view('login/vwfooterlogin');
                }
        }

        public function inicio()
        {

                if ($this->session->userdata('tipo') == 'admin') {
                        $lista = $this->Usuario_model->listausuarios();
                        $data['usuario'] = $lista;
                        $listadeshabilitados = $this->Usuario_model->listausuariosdeshabilitados();
                        $data['usuariodeshabilitados'] = $listadeshabilitados;
                        $this->load->view('inc/headergentelella');
                        $this->load->view('inc/sidebargentelella');
                        $this->load->view('inc/topbargentelella');
                        $this->load->view('usuario/usuario_lista_read', $data);
                        $this->load->view('inc/creditosgentelella');
                        $this->load->view('inc/footergentelella');
                } else {
                        redirect('usuarios/panel', 'refresh');
                }
        }

        public function agregar()
        {
                $data['msg'] = $this->uri->segment(3);
                $this->load->view('inc/headergentelella');
                $this->load->view('inc/sidebargentelella');
                $this->load->view('inc/topbargentelella');
                $this->load->view('usuario/usuario_formulario_insert', $data);
                $this->load->view('inc/creditosgentelella');
                $this->load->view('inc/footergentelella');
        }
        public function agregarbd()
        {
                $this->load->library('form_validation');
                $this->form_validation->set_rules(
                        'login',
                        'Username del usuarios',
                        'required|min_length[3]|max_length[50]',
                        array(
                                'required' => 'Se requiere ingresar el nombre de usuarios!.',
                                'min_length' => 'El usuarios debe tener al menos 3 caracteres.',
                                'max_length' => '¡El usuarios no debe contener más de 50 caracteres!.',
                                
                        )
                );
                $this->form_validation->set_rules(
                        'password',
                        'Contraseña del usuario',
                        'required|min_length[4]',
                        array(
                                'required' => 'Se requiere ingresar la contraseña del usuarios.',
                                'min_length' => '¡La contraseña debe tener al menos 4 caracteres!.'
                        )
                );
                if ($this->form_validation->run() == FALSE) {

                        $lista = $this->Usuario_model->listausuarios();
                        $data['usuario'] = $lista;
                        $data['msg'] = $this->uri->segment(3);

                        $this->load->view('inc/headergentelella');
                        $this->load->view('inc/sidebargentelella');
                        $this->load->view('inc/topbargentelella');
                        $this->load->view('usuario/usuario_formulario_insert', $data);
                        $this->load->view('inc/creditosgentelella');
                        $this->load->view('inc/footergentelella');
                } else {
                        $nombreCompleto = $_FILES['archivoImagen']['name'];
                        $config['upload_path']          = './uploads/user_images/';
                        $config['allowed_types']        = 'gif|jpg|png|jpeg';
                        $config['max_width']            = 0;
                        $config['max_height']           = 0;
                        $config['mod_mime_fix']           = FALSE;
                        $config['file_name'] = $nombreCompleto;
                        $this->load->library('upload', $config);

                        if (!$this->upload->do_upload('archivoImagen')) {

                                $data['idEmpleado'] = $_POST['idempleado'];
                                $usuario = mb_strtoupper($_POST['login']);
                                $validarusuario = $this->Usuario_model->validarusuario($usuario);
                                if ($validarusuario->num_rows() > 0) {
                                        redirect('usuarios/agregar/1', 'refresh');
                                } else {

                                        $contrasena = MD5($_POST['password']);
                                        $validarcontrasena = $this->Usuario_model->validarcontrasena($contrasena);
                                        if ($validarcontrasena->num_rows() > 0) {
                                                redirect('usuarios/agregar/2', 'refresh');
                                        } else {
                                                $data['login'] = mb_strtoupper($_POST['login']);
                                                $data['password'] = md5($_POST['password']);
                                                $data['tipo'] = $_POST['tipo'];

                                                $data['foto'] = $nombreCompleto;


                                                $this->Usuario_model->agregarusuarios($data);

                                                $empleado = $_POST['idempleado'];
                                                $base['estado'] = '2';

                                                $this->Persona_model->modificaridempleado($empleado, $base);

                                                redirect('usuarios/inicio', 'refresh');
                                        }
                                }
                        } else {

                                $data['idEmpleado'] = $_POST['idempleado'];
                                $usuario = mb_strtoupper($_POST['login']);
                                $validarusuario = $this->Usuario_model->validarusuario($usuario);
                                if ($validarusuario->num_rows() > 0) {
                                        redirect('usuarios/agregar/1', 'refresh');
                                } else {

                                        $contrasena = MD5($_POST['password']);
                                        $validarcontrasena = $this->Usuario_model->validarcontrasena($contrasena);
                                        if ($validarcontrasena->num_rows() > 0) {
                                                redirect('usuarios/agregar/2', 'refresh');
                                        } else {
                                                $data['login'] = mb_strtoupper($_POST['login']);
                                                $data['password'] = md5($_POST['password']);
                                                $data['tipo'] = $_POST['tipo'];

                                                $data['foto'] = $nombreCompleto;


                                                $this->Usuario_model->agregarusuarios($data);

                                                $empleado = $_POST['idempleado'];
                                                $base['estado'] = '2';

                                                $this->Persona_model->modificaridempleado($empleado, $base);

                                                redirect('usuarios/inicio', 'refresh');
                                        }
                                }
                        }
                }
        }

        public function modificar()
        {
                $idusuario = $_POST['idusuario'];
                $data['infousuario'] = $this->Usuario_model->recuperarusuarios($idusuario);
                $this->load->view('inc/headergentelella');
                $this->load->view('inc/sidebargentelella');
                $this->load->view('inc/topbargentelella');
                $this->load->view('usuario/usuario_formulario_update', $data);
                $this->load->view('inc/creditosgentelella');
                $this->load->view('inc/footergentelella');
        }

        public function modificarbd()
        {

                //inicio lógica de guardado de archivos
                //$nombrearchivo = $idusuario . ".jpg";
                //ruta donde se guardan los archivos
                // $config['upload_path'] = './uploads/user';
                //nombre del archivo
                // $config['file_name'] = $nombrearchivo;
                // $direccion = "./uploads/user/" . $nombrearchivo;
                // if (file_exists($direccion)) {
                //          unlink($direccion);
                //  }
                //tipos de archivos permitidos
                // $config['allowed_types'] = 'jpg|png|jpeg';
                //$this->load->library('upload', $config);
                // if (!$this->upload->do_upload()) {
                //        $data['error'] = $this->upload->display_errors();
                //  } else {
                //          $data['foto'] = $nombrearchivo;
                //          $this->upload->data();
                // }
                //fin lógica guardado de archivos
                $idusuario = $_POST['idusuario'];
                $data['login'] = strtolower($_POST['login']);
                $data['password'] = md5($_POST['password']);
                $data['fechaActualizacion'] = date('Y-m-d H:i:s');


                if ($_FILES['archivoImagen']['name'] != null) {
                        // echo "Tiene datos La variable";
                        $nombrearchivo = $_POST['nombreimagen'];
                        $file = "uploads/user_images/".$nombrearchivo;
                        if ($nombrearchivo) {
                                //unlink($file);
                        }
                        // aqui se actualiza ambos una NUEVA foto y nueva/antigua descrip
                        $config['upload_path']          = './uploads/user_images/';
                        $config['allowed_types']        = 'gif|jpg|png|jpeg';
                        $config['max_width']            = 0;
                        $config['max_height']           = 0;
                        $config['mod_mime_fix']           = FALSE;
                        $this->load->library('upload', $config);

                        if ($this->upload->do_upload('archivoImagen')) {

                                $data['foto'] = $_FILES['archivoImagen']['name'];
                                $this->Usuario_model->modificarusuarios($idusuario, $data);
                                redirect('usuarios/inicio', 'refresh');
                        } else {
                                $data['titulo'] = 'Subir imagen | Error';
                                $data['error'] = array('error' => $this->upload->display_errors());
                                $this->load->view('errors/formulario_error', $data);
                        }
                } else {
                        $this->Usuario_model->modificarusuarios($idusuario, $data);
                       redirect('usuarios/inicio', 'refresh');
                }
        }

        public function deshabilitarbd($idusuario)
        {

                $data['estado'] = '0';
                $this->Usuario_model->modificarusuarios($idusuario, $data);
                redirect('usuarios/inicio', 'refresh');
        }

        public function habilitarbd()
        {
                $idusuario = $_POST['idusuario'];
                $data['estado'] = '1';
                $this->Usuario_model->modificarusuarios($idusuario, $data);
                redirect('usuarios/inicio', 'refresh');
        }

        public function validar()
        {
                $login = $_POST['login'];
                $password = md5($_POST['password']);
                $consulta = $this->Usuario_model->validar($login, $password);

                if ($consulta->num_rows() > 0) {
                        //validacion efectiva
                        foreach ($consulta->result() as $row) {
                                # code...
                                $this->session->set_userdata('idusuario', $row->idUsuario);
                                $this->session->set_userdata('login', $row->login);
                                $this->session->set_userdata('tipo', $row->tipo);
                                $this->session->set_userdata('foto', $row->foto);

                                redirect('usuarios/panel', 'refresh');
                        }
                } else {
                        //error al validar redirigimos al login
                        redirect('usuarios/index/2', 'refresh');
                }
        }

        public function panel()
        {
                if ($this->session->userdata('login')) {

                        if ($this->session->userdata('tipo') == "admin") {
                                //cargo admin
                                redirect('producto/index', 'refresh');
                        } else if ($this->session->userdata('tipo') == "vendedor") {
                                //cargo vendedor 
                                redirect('producto/index2', 'refresh');
                        }
                } else {
                        //USUARIO NO LOGUEADO
                        redirect('usuarios/index/3', 'refresh');
                }
        }
        public function perfil()
        {
                $idusuario = $this->session->userdata('idusuario');
                $data['infousuario'] = $this->Usuario_model->recuperarusuarios($idusuario);
                $this->load->view('inc/headergentelella');
                $this->load->view('inc/sidebargentelella');
                $this->load->view('inc/topbargentelella');
                $this->load->view('usuario/usuario_perfil', $data);
                $this->load->view('inc/creditosgentelella');
                $this->load->view('inc/footergentelella');
        }

        public function logout()
        {
                $this->session->sess_destroy();
                redirect('usuarios/index/1', 'refresh');
        }
}
