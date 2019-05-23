<center><h3>Daftar Masakan</h3></center>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="panel">
		<div class="panel-heading">
			<div class="row">
			<a href="#tambah" class="btn btn-primary" data-toggle="modal"><span></span>Tambah</a>
			</div>
		</div>
		<div class="panel-body">
			<table class="table table-bordered">
				<tr>
					<th>NO</th>
					<th>ID Masakan</th>
					<th>Nama Masakan</th>
					<th>Harga</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>

				<?php
					$no=0;
					foreach ($data_mak as $dm) {
						$no++;
						echo '<tr>
								<td>'.$no.'</td>
								<td>'.$dm->id_masakan.'</td>
								<td>'.$dm->nama_masakan.'</td>
								<td>'.$dm->harga.'</td>
								<td>'.$dm->status_masakan.'</td>
								<td><a href="#update" onclick="tm_detail('.$dm->id_masakan.')" class="btn btn-warning" data-toggle="modal">Ubah</a>
									<a href="'.base_url('index.php/masakan/deleteMasakan/'.$dm->id_masakan).'" class="btn btn-danger"I data-toggle="modal" onclick="return confirm(\'apakah anda ingin menghapus?\')">Hapus</a></td>
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

<div class="modal fade"id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah Masakan</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/masakan/simpan_masakan')?>" method="post" enctype="multipart/form-data">
        Nama Masakan
        <input type="text" name="nama_masakan" class="form-control"><br>
        Harga
        <input type="text" name="harga" class="form-control"><br>
        <label>Keterangan</label>
            <select class="form-control" name="status_masakan" id="status_masakan">
            	<option value="tersedia">tersedia</option>
            	<option value="habis">habis</option>
            </select>
        <input type="submit" name="simpan" value="simpan" class="btn btn-success">
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- /.modal update -->
<div class="modal fade" id="update">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update Data</h4>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('index.php/Masakan/update')?>" method="post" enctype="multipart/form-data">
        	<input type="hidden" name="id_masakan" id="id_masakan">
            <label>Nama Masakan</label>
            <input type="text" name="nama_masakan" id="nama_masakan" class="form-control">
            <label>Harga</label>
            <input type="text" name="harga" id="harga" class="form-control">
            <label>Keterangan</label>
            <select class="form-control" name="status_masakan" id="status_masakan">
            	<option value="tersedia">tersedia</option>
            	<option value="habis">habis</option>
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
	function tm_detail(id_masakan)
	{
		$.getJSON("<?= base_url()?>index.php/Masakan/detail/"+id_masakan,function(data){
			$('#id_masakan').val(data['id_masakan']);
			$('#nama_masakan').val(data['nama_masakan']);
			$('#harga').val(data['harga']);
			$('#status_masakan').val(data['status_masakan']);
		});
	}
</script>