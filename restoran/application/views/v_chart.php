<center><h3>Daftar Pesanan Anda</h3></center>

<div class="col-md-12">
<div class="panel">
<div class="panel-heading">
			<div class="row">
			<a href="Dashboard_pel" class="btn btn-primary">Pesan Lagi</a>
			<a href="#bayar" onclick="simpan_list_db()" class="btn btn-warning" data-toggle="modal">Bayar</a>
			</div>
		</div>
		<div class="panel-body">
		<table class="table table-bordered">
				<tr>
					<th>No.</th>
					<th>Nama Masakan</th>
					<th>Nomor meja</th>
					<th>Quantity</th>
					<th>Subtotal</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody id="tm_pesanan">
				
			</tbody>
			<form>
				<div id="tampil_status">
					
				</div>
			</form>
		</table>
	</div>
</div>
<div class="modal fade" id="bayar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Pembayaran</h4>
      </div>
      <div class="modal-body">
        <h3>Terimakasih telah belanja di restoran ukl </h3>
         <p>Untuk melanjutkan pemesanan, silahkan membayar uang sejumlah Rp. <span id="totalnya">0</span> ke kasir</p>
         Kemudian ambil nota di kasir
        <form method="post" id="upload_bukti" enctype="multipart/form-data">
      		  <input type="hidden" name="id_order" id="id_order">   		  		 
        </form>
         <span id="pesan"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<script type="text/javascript">
	function load_cart() {
		$('#tm_pesanan').html('');
		$.getJSON("<?= base_url()?>index.php/Transaksi/tm_pesanan",function(hasil){
			var no=0;
			$.each(hasil['data_cart'],function(key,obj){
				no++;
				$("#tm_pesanan").append(
					'<tr>'+
						'<td>'+no+'</td>'+
						'<td>'+obj['name']+'</td>'+
						'<td>'+obj['meja']+'</td>'+
						'<td>'+obj['qty']+'</td>'+
						'<td align="left">'+obj['subtotal']+'</td>'+
						'<td><a href="#" onclick="if(confirm(\'apakah anda ingin menghapus\')){ hapus_cart(\''+obj['rowid']+'\')}"><i class="btn btn-danger">Hapus</i></a></td>'+
					'</tr>'
					);
			});
				$("#tm_pesanan").append(
				'<tr>'+
					'<td colspan="4">Total Keseluruhan</td>'+
					'<td align="left">'+hasil['total_seluruh']+'</td>'+
					'<td><a href="#" onclick="if (confirm(\'apakah anda ingin menghapus?\')) {hapus_all()}"><i class="btn btn-danger">Hapus</i></a></td>'+
				'</tr>'
				);
		});
	}
	load_cart();

	//bayar
	function simpan_list_db(){
		$.getJSON("<?= base_url()?>index.php/Transaksi/simpan_bayar",function(hasil){
		if (hasil['status']==1) {
			$("#pesan").html('Pesanan anda sudah terkirim, tunggu konfirmasi dari kasir');
			$("#pesan").show('animate');
			$("#pesan").addClass("alert alert-success");
			setTimeout(function(){
					$("#pesan").hide('animate');
					$("#pesan").removeClass("alert alert-success");
					setTimeout(function(){
						$("#totalnya").html(hasil['total']);
						$("#bayar").modal("show");
						$("#id_order").val(hasil['id_order']);
						load_total_cart();
						load_cart();
					}, 500);
				}, 3000);
			}
		});
	}
	
	
	

	
</script>