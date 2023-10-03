<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    require_once APPPATH."/third_party/fpdf/fpdf.php";
    class Pdf extends FPDF {		
		
        public function Header(){
            //si se requiere agregar una imagen
            //$this->Image('ruta de la imagen',x,y,ancho,alto);
           
            $this->SetFont('Arial','B',5);
            $this->Cell(30);
        
            $this->Cell(30);
            $this->Cell(120, 10, '', 0, 0, 'C');
            $this->Ln(5);
            $ruta = base_url("img/logo3.png");
            $this->Image($ruta, 60, 60, 100, 100);

       }

	   public function Footer(){

             
        $this->SetY(-15);
        $this->Cell(40,1,utf8_decode('Fecha de imprecion:'),0,0,'L',0);
        $this->SetFont('Arial','',11);
        $this->Cell(40,1,utf8_decode(date("d/m/Y")),0,1,'L',0);
           $this->SetY(-15);
           $this->SetFont('Arial','I',7);
           $this->Cell(0,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'R');
      
      }
}
?>