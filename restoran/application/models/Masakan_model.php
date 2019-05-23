<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masakan_model extends CI_Model {

	public function get_tb_masakan()
	{
		return $this->db->get('Masakan')->result();
	}
	public function insert_masakan()
	{
		$data_masakan=array(
			'nama_masakan'=>$this->input->post('nama_masakan'),
			'harga'=>$this->input->post('harga'),
			'status_masakan'=>$this->input->post('status_masakan'),
		);
		$sql_masuk=$this->db->insert('masakan', $data_masakan);
		return $sql_masuk;
	}
	public function get_detail($id_masakan)
	{
		return $this->db->where('id_masakan', $id_masakan)->get('masakan')->row();
	}
	public function update()
	{
		$data = array('nama_masakan' => $this->input->post('nama_masakan'),
					'harga' => $this->input->post('harga'),
					'status_masakan' => $this->input->post('status_masakan') 
				);
		return $this->db->where('id_masakan', $this->input->post('id_masakan'))->update('masakan',$data);

		if ($this->db->affected_rows()>0) 
		{
			return true;
		}
		else
		{
			return false;
		}

	}
	public function delete_masakan($id_masakan)
	{
		$delete = $this->db->where('id_masakan',$id_masakan)->delete('masakan');
		return $delete;
	}

}