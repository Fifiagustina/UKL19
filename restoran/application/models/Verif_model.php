<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verif_model extends CI_Model {

	public function detail($id_order)
	{
		return $this->db->join('pelanggan', 'pelanggan.id_pelanggan = tb_order.id_pelanggan')
						->where('id_order',$id_order)
						->get('tb_order')
						->row();
	}
	public function update()
	{
		$data = array('status' =>  $this->input->post('ubah_status'));

		$this->db->where('id_order', $this->input->post('id_order'))->update('tb_order',$data);

		if ($this->db->affected_rows()>0) {
			return true;
		}
		else
		{
			return false;
		}
	}
	public function get_riwayat($id)
	{
		return $this->db->select('detail_order.id_order, pelanggan.nama, tb_order.tanggal,detail_order.no_meja, tb_order.total_bayar')
						->join('tb_order','tb_order.id_order=detail_order.id_order')
						->join('pelanggan', 'pelanggan.id_pelanggan=tb_order.id_pelanggan')
						->where('id_detail_order',$id)
						->get('detail_order')
						->result();
	}

}

/* End of file Verif_model.php */
/* Location: ./application/models/Verif_model.php */