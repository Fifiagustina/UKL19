<center><h3>Daftar Laporan</h3></center> 
<!-- detail order -->
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
				
					<th>Nama Pelanggan</th>
					<th>Tanggal</th>
					<th>No. Meja</th>
					<th>Jumlah</th>
          			<th>Total Bayar</th>
          			<th>Aksi</th>
				</tr>

				<?php
				$no=0;
				foreach ($data_nota as $dn) 
				{
					$no++;
					echo '<tr>
							<td>'.$no.'</td>
							
							<td>'.$dn->nama.'</td>
							<td>'.$dn->tanggal.'</td>
							<td>'.$dn->no_meja.'</td>
							<td>'.$dn->jumlah.'</td>
							<td>'.$dn->total_bayar.'</td>
							<td><a href="#" class="btn btn-info" data-toggle="modal" data-target="#modal_detail_order" onclick="prepare_detail_order('.$dn->id_detail_order.')">Lihat Detail</a></td>
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
<div id="modal_detail_order" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Order</h4>
      </div>
      
	      <div class="modal-body">
	        	
	      </div>
	      <div class="modal-footer">
	        <a href="<?=base_url('index.php/nota')?>" class="btn btn-warning" id="cetak_nota" target="_blank">CETAK NOTA</a>
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
      
    </div>

  </div>
</div>
<script type="text/javascript">
	function prepare_detail_order(id)
	{
		$(".modal-body").empty();

		$.getJSON('<?= base_url()?>index.php/Verifikasi/get_detail_by_id/'+id, function(data){
			$(".modal-body").html(data.show_detail);
		});

		
	}
</script>