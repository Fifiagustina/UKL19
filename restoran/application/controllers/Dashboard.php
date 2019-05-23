<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['konten']="v_dashboard";
		$this->load->view('Template',$data);		
	}
	public function tampil_kasir()
	{
		$this->load->model('Dashboard_model');
		$data['data_pel']=$this->Dashboard_model->get_order();
		$data['konten']="v_konfirmasi_kasir";
		$this->load->view('Template', $data);
	}
	public function tampil_nota()
	{
		$this->load->model('Dashboard_model');
		$data['data_nota']=$this->Dashboard_model->get_nota();
		$data['konten']="v_detail_order";
		$this->load->view('Template', $data);
	}
	



}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */