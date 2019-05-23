<center><h3>Daftar Order</h3></center>
<!-- tabel order -->
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="panel">
		<div class="panel-heading">
			<div class="row">
				<div class="col-xs-12 col-sm-6"></div>
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tr>
					<th>NO</th>
					<th>ID Order</th>
					<th>Tanggal</th>
					<th>Nama Pelanggan</th>
					<th>Username</th>
          			<th>Total Bayar</th>
          			<th>Status</th>
          			<th>Aksi</th>
				</tr>
				<?php
				$no=0;
				foreach ($data_pel as $dt_p) {
					$no++;
					echo '<tr>
								<td>'.$no.'</td>
								<td>'.$dt_p->id_order.'</td>
								<td>'.$dt_p->tanggal.'</td>
               					 <td>'.$dt_p->nama.'</td>
               					 <td>'.$dt_p->username.'</td>
								<td>'.$dt_p->total_bayar.'</td>
								<td>'.$dt_p->status.'</td>
	        					<td><a href="#update" class="btn btn-warning" data-toggle="modal" onclick="tm_detail('.$dt_p->id_order.')">Ubah</a></td>
							</tr>';
				}

				?>
				
			</table>
			<?php if ($this->session->flashdata('pesan')!=null): ?>
                                   <div class="alert alert-success">
                                       <?= $this->session->flashdata('pesan')?>
                                   </div>
            <?php endif ?>
		</div>
	</div>
</div>
<!-- /.modal update -->
<div class="modal fade" id="update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update status</h4>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('index.php/Verifikasi/update')?>" method="post" enctype="multipart/form-data">
        	<input type="hidden" name="id_order" id="id_order">
            <label>Status</label>
            <select class="form-control" name="ubah_status" id="ubah_status">
	        		<option value="proses">proses</option>
	        		<option value="lunas">lunas</option>
	        </select>
             <button type="submit" name="simpan" value="Simpan" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
      </div>
      <div class="modal-footer">
        
        
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<script type="text/javascript">
	function tm_detail(id_order)
	{
		$.getJSON("<?= base_url()?>index.php/Verifikasi/get_detail_order/"+id_order,function(data)
			{
				$('#id_order').val(data['id_order']);
				$('#ubah_status').val(data['status']);
			});
	}
</script>