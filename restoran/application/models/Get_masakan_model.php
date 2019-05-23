<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_masakan_model extends CI_Model {

	public function get_masakan()
	{
		return $this->db->get('masakan')->result();
	}
	
	public function get_detail_mas($id_masakan)
	{
		return $this->db->where('id_masakan',$id_masakan)
						->get('masakan')->row();
	}
	public function get_last_order()
	{
		return $this->db->where('id_pelanggan',$this->session->userdata('id_pelanggan'))
						->limit('1')
						->order_by('id_order','desc')
						->get('tb_order')
						->row();
	}
	public function buat_order()
	{

		$data = array('id_pelanggan' => $this->session->userdata('id_pelanggan'),
						'tanggal' => date('Y-m-d')
						 );
		return $this->db->insert('tb_order', $data);
	}
	public function update_total($id_order)
	{
		$data = array('total_bayar' => $this->cart->total());

		return $this->db->where('id_order', $id_order)->update('tb_order',$data);
	}

}

/* End of file Get_masakan_model.php */
/* Location: ./application/models/Get_masakan_model.php */