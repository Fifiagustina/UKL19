<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota_model extends CI_Model {

	public function get_pelanggan()
		{
			return $this->db->get('pelanggan')->result();
		}
	public function get_detail_order()
		{
			return $this->db->get('detail_order')->result();
		}		
	public function get_tb_order()
		{
			return $this->db->get('tb_order')->result();
		}
	public function get_nota()
	{
		return $this->db
		->join('tb_order','tb_order.id_order=detail_order.id_order')
		->order_by('id_detail_order','asc')
		->get('detail_order')->result()
		;
	}		

}