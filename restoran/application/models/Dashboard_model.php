<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function get_order()
	{
		return $this->db->join('pelanggan', 'pelanggan.id_pelanggan = tb_order.id_pelanggan')->get('tb_order')->result();
	}
	public function get_nota()
	{
		return $this->db->join('tb_order', 'tb_order.id_order = detail_order.id_order')
						->join('pelanggan','pelanggan.id_pelanggan=tb_order.id_pelanggan')
						->get('detail_order')->result();
	}

}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */