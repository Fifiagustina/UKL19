<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {
    public function get_pelanggan()
    {
        $data_pelanggan = $this->db->get('pelanggan')->result();
        return $data_pelanggan;
    }
    public function masuk_db()
    {
        $data_pelanggan=array(
            'nama'=>$this->input->post('nama'),
            'alamat'=>$this->input->post('alamat'),
            'telp'=>$this->input->post('telp'),
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password')
        );
        $sql_masuk = $this->db->insert('pelanggan',$data_pelanggan);
        return $sql_masuk;
    }
    public function detail_pelanggan($id_pelanggan){
        return $this->db->where('id_pelanggan',$id_pelanggan)->get('pelanggan')->row();
    }
    public function update_pelanggan($value="")
    {
        $dt_up_pelanggan=array(
            'nama'=>$this->input->post('nama'),
            'alamat'=>$this->input->post('alamat'),
            'telp'=>$this->input->post('telp'),
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password')
        );
        return $this->db->where('id_pelanggan', $this->input->post('id_pelanggan'))->update('pelanggan',
        $dt_up_pelanggan);
    }
    public function delete_pelanggan($id_pelanggan)
    {
        $delete = $this->db->where('id_pelanggan',$id_pelanggan)->delete('pelanggan');
        return $delete;
    }
}