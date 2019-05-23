<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota extends CI_Controller {

	public function index()
	{
		$this->load->model('Nota_model');
		$data['data_nota'] = $this->Nota_model->get_nota();
		$this->load->view('v_nota', $data);	
	}

}
