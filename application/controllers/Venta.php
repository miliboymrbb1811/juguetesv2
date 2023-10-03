<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Venta extends CI_Controller
{

    public function index()
    {

        if ($this->session->userdata('tipo') == 'admin'|| $this->session->userdata('tipo') == 'vendedor') {
            $data['venta'] = $this->venta_model->listaventa();

            $views = [
                'inc/headergentelella',
                'inc/sidebargentelella',
                'inc/topbargentelella',
                'venta/venta_lista_read',
                'inc/creditosgentelella',
                'inc/footergentelella'
            ];

            foreach ($views as $view) {
                $this->load->view($view, $data);
            }
        } else {
            redirect('usuarios/panel','refresh');
        }
    }
    public function index2()
    {
        if ($this->session->userdata('tipo') == 'vendedor') {
            $lista = $this->venta_model->listaventa();
            $data['venta'] = $lista;

            $this->load->view('inc/headergentelella');
            $this->load->view('inc/sidebargentelella');
            $this->load->view('inc/topbargentelella');
            $this->load->view('venta/ventaVendedor/venta_lista_read', $data);
            $this->load->view('inc/creditosgentelella');
            $this->load->view('inc/footergentelella');

            /*$this->load->view('inc/header');
        $this->load->view('lista_read',$data);
        $this->load->view('inc/footer');*/
        } else {
            redirect('usuarios/panel', 'refresh');
        }
    }
    public function vistaAgregarVenta()
    {

        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('venta/venta_formulario_insert');
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
    }
    public function vistaActualizar()
    {
        $idVenta = $this->input->post('idVenta');

        $data['venta'] = $this->venta_model->recuperarVenta($idVenta);

        $this->load->view('inc/headergentelella');
        $this->load->view('inc/sidebargentelella');
        $this->load->view('inc/topbargentelella');
        $this->load->view('venta/venta_formulario_update', $data);
        $this->load->view('inc/creditosgentelella');
        $this->load->view('inc/footergentelella');
    }


    public function buscar()
    {
        $search_data = $this->input->post('producto');

        $query = $this->venta_model->buscarProducto($search_data);
        $datos = json_encode($query->result());
        if (!empty($query->result())) {


            foreach ($query->result() as $row) {
                echo "<li class='list-group-item'><a href='javascript:void(0)' data-producto='producto'>$row->numeroTienda</a></li>";
            }
        } else {
            echo "<li> <em> No se encuentra... </em> </li>";
        }
    }

    public function productList()
    {
        // POST data
        $postData = $this->input->post();

        // Get data
        $data = $this->venta_model->getProducts($postData);

        echo json_encode($data);
    }

    public function marcaList()
    {

        // POST data
        $producto = $this->input->post('producto');

        // Get data
        $data = $this->venta_model->getMarcas($producto);

        echo json_encode($data);
    }

    public function clientList()
    {
        // POST data
        $postData = $this->input->post();

        // Get data
        $data = $this->cliente_model->getClients($postData);

        echo json_encode($data);
    }


    public function insertVenta()
    {

        $data['idCliente'] = $_POST['idclient'];
        $data['idUsuario'] =  $_SESSION['idusuario'];
        $data['estado'] = 1;

        // $data['idVenta'] = $_POST['idCliente'];
        $data['idProducto'] = $_POST['idProducto'];
        $data['cantidad'] =  $_POST['cantidad'];;

        $data['precioTotal'] = $_POST['totalPrecio'];

        if ($this->venta_model->registrar($data)) {
            redirect('venta/index', 'refresh');
        };


        // print_r($data);
        // // $this->producto_model->agregarproductos($data);
        // // redirect('producto/index', 'refresh');
    }


    public function modificarVenta()
    {
        $data['precioTotal'] = $_POST['totalPrecio'];
        $data['idCliente'] = $_POST['idclient'];
        $data['idUsuario'] =  $_SESSION['idusuario'];
        $id =  $_POST['idVenta'];
        $data['estado'] = 1;
        $data['idProducto'] = $_POST['idProducto'];
        $data['cantidad'] =  $_POST['cantidad'];


        if ($this->venta_model->actualizar($id, $data)) {
            redirect('venta/index', 'refresh');
        };


        // print_r($data);
        // // $this->producto_model->agregarproductos($data);
        // // redirect('producto/index', 'refresh');
    }

    public function insertVenta2()
    {
        // POST data
        $postData = $this->input->post();

        // Get data
        $data = $this->venta_model->registrar($postData);

        echo json_encode($data);
    }
    public function deshabilitarbd($idventa)
    {
        $data['estado'] = '0';
        $this->venta_model->modificarventa($idventa, $data);
        redirect('venta/index', 'refresh');
    }
    //--------------------------------------------------------------------------------------------------//
    public function reportepdf()
    {

        if ($this->session->userdata('tipo') == 'admin' || 'vendedor') {


            $req = $this->venta_model->detalle($_POST['idventa']);
            $req = $req->result(); //convertir a array bidemencional

            $this->pdf = new Pdf();
            $this->pdf->addPage('P','letter');
            $this->pdf->AliasNbPages();
            $this->pdf->SetTitle("Detalle venta"); //título en el encabezado
            $this->pdf->Ln(0);
            
            
            $this->pdf->SetLeftMargin(20); //margen izquierdo
            $this->pdf->SetRightMargin(20); //margen derecho
            $this->pdf->SetFillColor(255, 255, 255); //color de fondo
            $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
            $this->pdf->Cell(0, 5, 'COMPROBANTE', 0, 1, 'C', 1);
            $this->pdf->Cell(0, 5, 'DETALLE DE VENTA', 0, 1, 'C', 1);
            $this->pdf->Ln();
            $this->pdf->Image("img/miniatura.png", 165, 10, 35, 30, 'PNG');
            $this->pdf->SetFont('Arial', 'B', 10);
            $this->pdf->Ln(0);

            $this->pdf->Ln(0);
            $actividad = $this->venta_model->listaventa1($_POST['idventa']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $usuario = $rows->login;
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Usuario asignado:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($usuario), 0, 1, 'L', 0);

            $this->pdf->Ln(0);
            $actividad = $this->venta_model->detalle($_POST['idventa']);
            $actividad = $actividad->result();
            foreach ($actividad as $rowa) {
                $act = $rowa->nombreCliente;
            }
            $this->pdf->Cell(50, 7, utf8_decode('cliente:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($act), 0, 1, 'L', 0);


            $this->pdf->Ln(0);
            $actividad = $this->venta_model->reporteventa($_POST['idventa']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $fechaRegistro = formatearFechaMasHora($rows->fechaRegistro);
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('fecha y hora de registro:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($fechaRegistro), 0, 1, 'L', 0);


            $this->pdf->Ln(0);
            $ventaId = $_POST['idventa'];
            $this->pdf->SetFillColor(255, 255, 255);
            $this->pdf->SetTextColor(0, 0, 0);
            $this->pdf->Cell(325, 8, 'Nro. de registro'.' :'.utf8_decode($ventaId) , 0, 1, 'C', 1);
            $this->pdf->SetFillColor(0, 0, 0);
            $this->pdf->SetTextColor(255, 255, 255);
            $this->pdf->Cell(180, 8, 'DETALLE', 0, 1, 'C', 1);
           
            // Obtén el ID de la venta desde el formulari
            $this->pdf->SetTextColor(0, 0, 0);
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(30, 8, utf8_decode('Cantidad'), 1, 0, 'C', 0);
            $this->pdf->Cell(20, 8, utf8_decode('cajas'), 1, 0, 'C', 0);
            $this->pdf->Cell(80, 8, utf8_decode('Producto'), 1, 0, 'C', 0);
            $this->pdf->Cell(20, 8, utf8_decode('P/U'), 1, 0, 'C', 0);
            $this->pdf->Cell(30, 8, utf8_decode('Total Bs'), 1, 1, 'C', 0);



            foreach ($req as $row) {

                $descripcion = $row->nombreProducto;
                $precio = $row->precio;
                $cantidad = $row->cantidad;
                $categoria = $row->numeroCategoria;
                $total = $row->precioTotal;
                
                $this->pdf->SetFont('Arial', '', 10);
                $this->pdf->Cell(30, 5, utf8_decode($cantidad), 1, 0, 'C', false);
                
                // Asegurarse de que $categoria no sea igual a cero para evitar una división por cero
                if ($categoria != 0) {
                    $resultado = $cantidad / $categoria;
                } else {
                    $resultado = 0; // Otra acción en caso de división por cero
                }
                
                $this->pdf->Cell(20, 5, utf8_decode($resultado), 1, 0, 'C', false);
                $this->pdf->Cell(80, 5, utf8_decode($descripcion), 1, 0, 'L', false);
                $this->pdf->Cell(20, 5, utf8_decode($precio), 1, 0, 'C', false);
                $this->pdf->Cell(30, 5, utf8_decode($total), 1, 0, 'C', false);
                
                $this->pdf->Ln();
                
            }

            $this->pdf->Ln(2);
            $actividad = $this->venta_model->detalle($_POST['idventa']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $total1 = $row->total;
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(150, 7, utf8_decode('TOTAL (Bs.):'),  1, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(30, 7, utf8_decode($total1), 1, 1, 'C', 0);

            $this->pdf->Ln(10);
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(10, 7, utf8_decode('Son:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(40, 7, convertir($total1), 0, 1, 'L', 0);

            $this->pdf->Ln(10);
            $this->pdf->MultiCell(0, 5, utf8_decode('El presente es un comprobante de la compra realizada por el cliente.'), 0, 'J', 0);
            $this->pdf->Ln(10);
            $this->pdf->MultiCell(0, 5, utf8_decode('Gracias por su preferencia!!!'), 0, 'J', 0);


            $this->pdf->Output("DetalleVenta.pdf", "I");
        } else {
            redirect('controller_requerimientoinformacion/index', 'refresh');
        }
    }
    public function reportepdf1()
    {

        if ($this->session->userdata('tipo') == 'admin' || 'vendedor') {


            $req = $this->venta_model->detalle($_POST['idventa']);
            $req = $req->result(); //convertir a array bidemencional

            $this->pdf = new Pdf();
            $this->pdf->addPage('P', 'letter');
            $this->pdf->AliasNbPages();
            $this->pdf->SetTitle("Detalle venta"); //título en el encabezado
            $this->pdf->Ln(0);
            
            
            $this->pdf->SetLeftMargin(20); //margen izquierdo
            $this->pdf->SetRightMargin(20); //margen derecho
            $this->pdf->SetFillColor(255, 255, 255); //color de fondo
            $this->pdf->SetFont('Arial', 'B', 11); //tipo de letra
            $this->pdf->Cell(0, 5, 'COMPROBANTE', 0, 1, 'C', 1);
            $this->pdf->Cell(0, 5, 'DETALLE DE VENTA', 0, 1, 'C', 1);
            $this->pdf->Ln();
            $this->pdf->Image("img/logosis2.png", 165, 10, 40, 38, 'PNG');
            $this->pdf->SetFont('Arial', 'B', 10);
            $this->pdf->Ln(0);

            $this->pdf->Ln(0);
            $actividad = $this->venta_model->listaventa1($_POST['idventa']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $usuario = $rows->login;
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('Usuario asignado:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($usuario), 0, 1, 'L', 0);

            $this->pdf->Ln(0);
            $actividad = $this->venta_model->detalle($_POST['idventa']);
            $actividad = $actividad->result();
            foreach ($actividad as $rowa) {
                $act = $rowa->nombreCliente;
            }
            $this->pdf->Cell(50, 7, utf8_decode('cliente:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($act), 0, 1, 'L', 0);


            $this->pdf->Ln(0);
            $actividad = $this->venta_model->reporteventa($_POST['idventa']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $fechaRegistro = formatearFechaMasHora($rows->fechaRegistro);
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(50, 7, utf8_decode('fecha y hora de registro:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(160, 7, utf8_decode($fechaRegistro), 0, 1, 'L', 0);


            $this->pdf->Ln(0);
            $ventaId = $_POST['idventa'];
            $this->pdf->SetFillColor(255, 255, 255);
            $this->pdf->SetTextColor(0, 0, 0);
            $this->pdf->Cell(325, 8, 'Nro. de registro'.' :'.utf8_decode($ventaId) , 0, 1, 'C', 1);
            $this->pdf->SetFillColor(0, 0, 0);
            $this->pdf->SetTextColor(255, 255, 255);
            $this->pdf->Cell(180, 8, 'DETALLE', 0, 1, 'C', 1);
           
            // Obtén el ID de la venta desde el formulari
            $this->pdf->SetTextColor(0, 0, 0);
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(30, 8, utf8_decode('Cantidad'), 1, 0, 'C', 0);
            $this->pdf->Cell(20, 8, utf8_decode('cajas'), 1, 0, 'C', 0);
            $this->pdf->Cell(80, 8, utf8_decode('Producto'), 1, 0, 'C', 0);
            $this->pdf->Cell(20, 8, utf8_decode('P/U'), 1, 0, 'C', 0);
            $this->pdf->Cell(30, 8, utf8_decode('Total Bs'), 1, 1, 'C', 0);



            foreach ($req as $row) {

                $descripcion = $row->nombreProducto;
                $precio = $row->precio;
                $cantidad = $row->cantidad;
                $categoria = $row->numeroCategoria;
                $total = $row->precioTotal;
                
                $this->pdf->SetFont('Arial', '', 10);
                $this->pdf->Cell(30, 5, utf8_decode($cantidad), 1, 0, 'C', false);
                
                // Asegurarse de que $categoria no sea igual a cero para evitar una división por cero
                if ($categoria != 0) {
                    $resultado = $cantidad / $categoria;
                } else {
                    $resultado = 0; // Otra acción en caso de división por cero
                }
                
                $this->pdf->Cell(20, 5, utf8_decode($resultado), 1, 0, 'C', false);
                $this->pdf->Cell(80, 5, utf8_decode($descripcion), 1, 0, 'L', false);
                $this->pdf->Cell(20, 5, utf8_decode($precio), 1, 0, 'C', false);
                $this->pdf->Cell(30, 5, utf8_decode($total), 1, 0, 'C', false);
                
                $this->pdf->Ln();
                
            }

            $this->pdf->Ln(2);
            $actividad = $this->venta_model->detalle($_POST['idventa']);
            $actividad = $actividad->result();
            foreach ($actividad as $rows) {
                $total1 = $row->total;
            }
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(150, 7, utf8_decode('TOTAL (Bs.):'),  1, 0, 'L', 0);
            $this->pdf->SetFont('Arial', '', 11);
            $this->pdf->Cell(30, 7, utf8_decode($total1), 1, 1, 'C', 0);

            $this->pdf->Ln(10);
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(10, 7, utf8_decode('Son:'), 0, 0, 'L', 0);
            $this->pdf->SetFont('Arial', 'B', 11);
            $this->pdf->Cell(40, 7, convertir($total1), 0, 1, 'L', 0);

            $this->pdf->Ln(10);
            $this->pdf->MultiCell(0, 5, utf8_decode('El presente es un comprobante de la compra realizada por el cliente.'), 0, 'J', 0);
            $this->pdf->Ln(10);
            $this->pdf->MultiCell(0, 5, utf8_decode('Gracias por su preferencia!!!'), 0, 'J', 0);


            $this->pdf->Output("DetalleVenta.pdf", "I");
        } else {
            redirect('controller_requerimientoinformacion/index', 'refresh');
        }
    
    }
}
