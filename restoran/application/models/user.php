<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Model {

	public function get_login()
		{
			return $this->db->where('username', $this->input->post('username'))->where('password', $this->input->post('password'))->get('data_user');
		}	

}

/* End of file user.php */
/* Location: ./application/models/user.php */