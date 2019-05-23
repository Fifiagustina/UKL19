<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model','login');
	}
	public function index()
	{
		$this->load->view('v_login');
	}
	public function proses_login()
	{
		if ($this->session->userdata('login_user') == false) 
		{
			$this->form_validation->set_rules('username','username','trim|required');
			$this->form_validation->set_rules('password','password','trim|required');

			if ($this->form_validation->run() == true) 
			{
				if ($this->login->cek_user() == true) 
				{
					
					redirect('Dashboard/index','refresh');
				}
				else
				{
					$this->session->set_flashdata('pesan','Login Gagal');
					redirect('login/index','refresh');

				}
			} 
			else 
			{
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('login/index','refresh');
			}
		}
		else
		{
			redirect('Dashboard/index','refresh');
		}
		
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('index.php/Login'),'refresh');
	}

}