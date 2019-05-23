<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function cek_user()
	{
		$login = $this->db->join('level','level.id_level=user.id_level')
						->where('username', $this->input->post('username'))
						->where('password', $this->input->post('password'))
						->get('user');

		if ($this->db->affected_rows()>0) 
		{
			$dt_user=$login->row();
			$array = array('id_user' => $dt_user->id_user,
							'username' => $dt_user->username,
							'password' => $dt_user->password,
							'nama_level' => $dt_user->nama_level,
							'login_user' => true 
						);

			$this->session->set_userdata($array);
			return true;
		}
		else
		{
			return false;
		}


	}

}