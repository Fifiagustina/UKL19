<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masakan extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('Masakan_model');
}
	public function index()
	{
		$data['konten']="v_masakan";
		$data['data_mak']=$this->Masakan_model->get_tb_masakan();
		$this->load->view('Template', $data);
	}
	public function simpan_masakan()
	{
		$this->form_validation->set_rules('nama_masakan', 'Nama Masakan',
		'trim|required', array('required' => 'Nama Masakan harus diisi'));
		$this->form_validation->set_rules('harga', 'Harga',
        'trim|required', array('required' => 'Harga Masakan harus diisi'));
        $this->form_validation->set_rules('status_masakan', 'Status Masakan',
		'trim|required', array('required' => 'Status Masakan harus diisi'));
		
		if ($this->form_validation->run() == TRUE ) 
		{
			$this->load->model('masakan_model','masakan');
			$masuk=$this->masakan->insert_masakan();
			if($masuk==true){
				$this->session->set_flashdata('pesan','sukses tambah');
			} else{
				$this->session->set_flashdata('pesan', 'gagal tambah');
			}
			redirect(base_url('index.php/masakan'),'refresh');
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/masakan'), 'refresh');
		}
	}
	public function detail($id_masakan)
	{
		$data_detail = $this->Masakan_model->get_detail($id_masakan);
		echo json_encode($data_detail);
	}
	public function update()
	{
		$this->form_validation->set_rules('nama_masakan', 'Nama Masakan', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('status_masakan', 'Status Masakan', 'trim|required');

		if ($this->form_validation->run() == TRUE) 
		{
			if ($this->Masakan_model->update()==true) 
			{
				$this->session->flashdata('pesan','berhasil ubah');
			}
			else
			{
				$this->session->flashdata('pesan','gagal ubah');
			}
			redirect('Masakan/index','refresh');
		} 
		else 
		{
			$this->session->flashdata('pesan',validation_errors());
			redirect('Masakan/index','refresh');
		}
	}
	public function deleteMasakan($id_masakan)
	{
			$this->load->model('masakan_model');
			$prosesDelete = $this->masakan_model->delete_masakan($id_masakan);
			if ($prosesDelete == TRUE) {
				$this->session->flashdata('pesan', 'Sukses Hapus Data');
			}else{
				$this->session->flashdata('pesan','Gagal Hapus Data');
			}
			redirect(base_url('index.php/masakan'),'refresh');
	}
	}



/* End of file Masakan.php */
/* Location: ./application/controllers/Masakan.php */