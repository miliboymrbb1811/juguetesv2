<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Principal extends CI_Controller {

	public function index()
	{

      
            $this->load->view('inc/headergentelella');
            $this->load->view('principal/index');
        
      
		
	}
}