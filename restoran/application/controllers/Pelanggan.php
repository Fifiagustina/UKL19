<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {


	public function index()
	{
		$data['konten']="v_pelanggan";
		$this->load->model('pelanggan_model');
		$data['data_pelanggan']=$this->pelanggan_model->get_pelanggan();
		$this->load->view('template', $data, FALSE);
		
	}
	public function simpan_pelanggan()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required',
        array('required' => 'Nama Pelanggan harus diisi'));
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required',
		array('required'=> 'Alamat harus diisi'));
		$this->form_validation->set_rules('telp', 'telp', 'trim|required',
		array('required'=> 'No Telp harus diisi'));
		$this->form_validation->set_rules('username', 'username', 'trim|required',
		array('required'=> 'Username harus diisi'));
		$this->form_validation->set_rules('password', 'password', 'trim|required',
		array('required'=> 'Passwords harus diisi'));

		if ($this->form_validation->run() == TRUE ) {
			$this->load->model('pelanggan_model','pel');
			$masuk=$this->pel->masuk_db();
			if($masuk==true){
				$this->session->set_flashdata('pesan','sukses tambah');
			} else{
				$this->session->set_flashdata('pesan', 'gagal tambah');
			}
			redirect(base_url('index.php/pelanggan'),'refresh');
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/pelanggan'), 'refresh');
		}
	}
	public function detail_pelanggan($id_pelanggan='')
	{
		$this->load->model('pelanggan_model');
		$data_detail=$this->pelanggan_model->detail_pelanggan($id_pelanggan);
		echo json_encode($data_detail);
	}
	public function update_pelanggan(){
		$this->form_validation->set_rules('nama','nama', 'trim|required');
		$this->form_validation->set_rules('alamat','alamat', 'trim|required');
		$this->form_validation->set_rules('telp','telp', 'trim|required');
		$this->form_validation->set_rules('username','username', 'trim|required');
		$this->form_validation->set_rules('password','passwords', 'trim|required');
		if ($this->form_validation->run()==FALSE) {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/pelanggan'),'refresh');
		}else{
			$this->load->model('pelanggan_model');
			$proses_update=$this->pelanggan_model->update_pelanggan();
			if($proses_update){
				$this->session->set_flashdata('pesan', 'sukses update');
			}
			else{
				$this->session->$this->session->set_flashdata('pesan', 'gagal update');
			}
			redirect(base_url('index.php/pelanggan'),'refresh');
		}
	}
	public function deletePelanggan($id_pelanggan)
	{
		$this->load->model('pelanggan_model');
		$prosesDelete = $this->pelanggan_model->delete_pelanggan($id_pelanggan);

		if ($prosesDelete == TRUE) {
			$this->session->flashdata('pesan', 'Sukses Hapus Data');
		}else{
			$this->session->flashdata('pesan','Gagal Hapus Data');
		}
		redirect(base_url('index.php/pelanggan'),'refresh');
	}
}