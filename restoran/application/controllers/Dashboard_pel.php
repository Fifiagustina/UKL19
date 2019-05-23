<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_pel extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('logged')==TRUE) {
			$data['konten']="v_dashboard_pelanggan";
			$this->load->view('Template', $data);
		}
		else
		{
			redirect('Login_pelanggan/index','refresh');
		}
		
	}

}

/* End of file Dashboard_pel.php */
/* Location: ./application/controllers/Dashboard_pel.php */