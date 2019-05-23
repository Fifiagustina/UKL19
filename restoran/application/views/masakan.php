<h2>Daftar Masakan</h2>
<?=$this->session->flashdata('pesan');?>
<center><a href="#tambah" data-toggle="modal" class="btn btn-warning">Tambah</a></center>
<table id="example" class="table teble-bordered">
	<thead>
		<tr>
			<td>Id Masakan</td>
			<td>Nama Masakan</td>
			<td>Harga</td>
			<td>Status Masakan</td>
		</tr>
	</thead>
	<tbody>
		<?php $no=0; foreach($masakan as $masak): $no++; ?>
		<tr>
		<td><?= $no ?></td>
		<td><img src="<?= base_url('assets/gambar/'.$masakan->foto_masakan) ?>" style="width: 40px;"></td>
		<td><?= $masakan->nama_masakan ?></td>
        <td><?= $masakan->harga ?></td>
        <td><?= $masakan->status_masakan ?></td>
		<td>
			<a href="#edit" onclick="edit('<?= $buku->kode_buku ?>')" data-toggle="modal" class="btn btn-success">Ubah</a>
			<a href="<?= base_url('index.php/buku/hapus/'.$buku->kode_buku) ?>" onclick="confirm('Apakah anda yakin menghapus ?')" data_toggle="modal" class="btn btn-danger">Hapus</a></center></a>
		</td>
		</tr>
	<?php endforeach?>
	</tbody>
</table>

<div class="modal fade" id="tambah">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Tambah Masakan</h4>
			</div>
			<div class="modal-body">
				<form action="<?=base_url('index.php/masakan/tambah')?>" method="post" enctype="multipart/form-data">
					<table>
						<tr>
							<td>Nama Masakan</td>
							<td><select name="masakan" required class="form-control">
								<?php foreach ($masakan as $mas ) : ?>
									<option value="<?= $mas->id_masakan ?>">
										<?= $mas->nama_masakan ?>
									</option>
								<?php endforeach ?>
							</select>
							</td>
						</tr>
						<tr>
							<td>Nama Masakan</td>
							<td><input type="text" name="nama_masakan" required class="form-control"></td>
						</tr>
						<tr>
							<td>Harga</td>
							<td><input type="text" name="harga" required class="form-control"></td>
						</tr>
						<tr>
							<td>Status Masakan</td>
							<td><input type="text" name="status_masakan" required class="form-control"></td>
						</tr>

					</table>
					<input type="submit" name="simpan" value="simpan" class="btn btn-success">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal"> Close</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">Ubah Buku</h4>
			</div>
			<div class="modal-body">
				<form action="<?=base_url('index.php/masakan/masakan_update')?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="id_masakan" id="id_masakan">
					<table>
						<tr>
							<td>Id Masakan</td>
							<td><input type="text" id="id_masakan" name="nama_masakan" required class="form-control"></td>
						</tr>
						<tr>
							<td>Nama Masakan</td>
							<td><select name="masakan" id="masakan" required class="form-control">
								<?php foreach ($masakan as $mas ) : ?>
									<option value="<?= $mas->id_masakan ?>">
										<?= $mas->nama_masakan ?>
									</option>
								<?php endforeach ?>
							</select>
							</td>
						</tr>
						<tr>
							<td>Nama Masakan</td>
							<td><input type="text" id="nama_masakan" name="nama_masakan" required class="form-control"></td>
						</tr>
						<tr>
							<td>Harga</td>
							<td><input type="text" id="harga" name="harga" required class="form-control"></td>
						</tr>
						<tr>
							<td>Status Masakan</td>
							<td><input type="text" id="status_masakan" name="status_masakan" class="form-control"></td>
						</tr>

					</table>
					<input type="submit" name="simpan" value="simpan" class="btn btn-success">
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal"> Close</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#example').DataTable();
	});
</script>
<script>
	function edit(a){
		$.ajax({
		type:"post",
		url:"<?= base_url() ?>index.php/masakan/edit_masakan/"+a,
		dataType:"json",
		success:function(data){
			$("#id_masakan").val(data.id_masakan);
			$("#nama_masakan").val(data.nama_masakan);
			$("#harga").val(data.harga);
			$("#status_masakan").val(data.status_masakan);
			}
		});
	}
</script>
