<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_masakan extends CI_Controller {
public function __construct()
{
	parent::__construct();
	$this->load->model('Get_masakan_model','gt_mas');
}
	public function index()
	{
		if ($this->session->userdata('logged')==TRUE) {
			$dt_mas = $this->gt_mas->get_masakan();
			echo json_encode($dt_mas);
		}
		else
		{
			redirect('Login_pelanggan/index','refresh');
		}
		
	}
	public function detail($id_masakan)
	{
		if ($this->session->userdata('logged')==TRUE) {
			$dt_mas=$this->gt_mas->get_detail_mas($id_masakan);
			echo json_encode($dt_mas);
		}
		else
		{
			redirect('Login_pelanggan/index','refresh');
		}
		
	}

}