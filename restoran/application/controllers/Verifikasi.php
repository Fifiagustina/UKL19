<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {

	public function get_detail_order($id_order)
	{
		$this->load->model('Verif_model','vm');
		$data_detail = $this->vm->detail($id_order);
		echo json_encode($data_detail);
	}
	public function update()
	{
		$this->load->model('Verif_model','vm');
		$this->form_validation->set_rules('ubah_status', 'fieldlabel', 'trim|required');

		if ($this->form_validation->run() == TRUE) 
		{
			if ($this->vm->update()==true) 
			{
				$this->session->flashdata('pesan','berhasil ubah');
			}
			else
			{
				$this->session->flashdata('pesan','gagal ubah');
			}
			redirect('Dashboard/tampil_kasir','refresh');
		} 
		else 
		{
			$this->session->flashdata('pesan',validation_errors());
			redirect('Dashboard/tampil_kasir','refresh');
		}
		
	}
	public function get_detail_by_id($id)
	{
		if ($this->session->userdata('logged') == true) 
		{
			$this->load->model('Verif_model');
			$detail_trans = $this->Verif_model->get_riwayat($id);
			$data['show_detail']="";
			$total=0;
			$no=1;
			$data['show_detail'] .= '<table class="table table-striped">
									<tr>
										<th>No</th>
										<th>ID Order</th>
										<th>Nama Pelanggan</th>
										<th>NO. meja</th>
										<th>Total Bayar</th>
									</tr>';

			foreach ($detail_trans as $d) 
			{
				$data['show_detail'] .= '<tr>
										<td>'.$no.'</td>
										<td>'.$d->id_order.'</td>
										<td>'.$d->nama.'</td>
										<td>'.$d->no_meja.'</td>
										<td>'.$d->total_bayar.'</td>	
										</tr>';
				$no++;
				$total += $d->total_bayar;
			}
				$data['show_detail'] .='</table>';
				$data['show_detail'] .='<h3><p class="text-right">Total Belanja:</p></h3>
									<h2><p class="text-right">Rp '.$total.',- </p></h2>';
				echo json_encode($data);
		}
		else
		{
			redirect('Login_pel/index','refresh');
		}
	}

}

/* End of file Verifikasi.php */
/* Location: ./application/controllers/Verifikasi.php */