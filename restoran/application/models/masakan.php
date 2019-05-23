<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class masakan extends CI_Model {

	public function masakan()
	{
		$masakan = $this->db->join('data_nama_masakan','data_nama_masakan.kode_nama=data_masakan.id_masakan')->get('data_masakan')->result();
		return $masakan;
	}
	public function data_masakan()
	{
		return $this->db->get('data_nama_masakan')->result();
	}
	public function simpan_masakan($nama_file)
	{
		if ($nama_file=="") {
			$object=array(
				'nama_masakan' =>$this->input->post('nama_masakan'),
				'harga' =>$this->input->post('harga'),
				'status_tersedia' =>$this->input->post('status_tersedia'),
			);
		}
		else{
			$object=array(
				'nama_masakan' =>$this->input->post('nama_masakan'),
				'harga' =>$this->input->post('harga'),
				'status_tersedia' =>$this->input->post('status_tersedia'),
				);
		}
		return $this->db->insert('data_masakan',$object );
	}
	public function detail($a)
	{
		$masakan=$this->db
		->join('data_nama_makanan','data_nama_makanan.kode_nama=data_masakan.id_masakan')
		->where('kode_buku', $a)
		->get('data_buku')
		->row();

		$total=$masakan->status_masakan;
		$total--;
		$object= array('status_masakan'=>$total);
		$this->db->where('id_masakan',$a)->update('data_masakan',$object);
		return $masakan;
	}
	public function hapus_masakan($id_masakan='')
	{
		return $this->db->where('id_masakan',$id_masakan)->delete('data_masakan');
	}
	public function masakan_update_no_foto()
	{
		$object=array(
				'nama_masakan' =>$this->input->post('nama_masakan'),
				'harga' =>$this->input->post('harga'),
				'status_masakan' =>$this->input->post('status_masakan'),
				);
		return $this->db->where('id_masakan', $this->input->post('id_masakan'))->update('data_masakan', $object );
	}
	public function masakan_update_with_foto($nama_foto='')
	{
		$object=array(
				'nama_masakan' =>$this->input->post('nama_masakan'),
				'harga' =>$this->input->post('harga'),
				'status_masakan' =>$this->input->post('status_masakan'),
			);
		return $this->db->where('id_masakan', $this->input->post('id_masakan'))->update('id_masakan', $object );
	}

}

/* End of file masakan.php */
/* Location: ./application/models/masakan.php */