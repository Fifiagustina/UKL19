<center><h2>Selamat Datang di Restoran UKL</h2></center><br>
<div class="col-md-12">
<center><div class="panel" position="center">
		<div class="panel-heading">
			<h3 class="panel-title">Menu Masakan</h3>
			<p>Silahkan Memesan Sesuka Hati</p>
			<div class="right">
				<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
				<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
			</div>
		</div>

		<div class="panel-body">
			<ul class="list-unstyled todo-list">
				<li>
					<div id="tampil_masakan"></div>
				</li>
			</ul>
	</div>
</div></center>

<div class="modal fade" id="detail_masakan">
<div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">
              <span aria-hidden="true"></span>
              <span class="sr-only">Close</span>
              </button>
              <h4 class="modal-title">Detail Masakan</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div id="deskripsi"></div>
                  <div id="no_meja"></div>
                  <div id="jumlah"></div>
                  <div id="btn"></div><br>
                  <div id="pesan"></div>
                </div>
              </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>


<script type="text/javascript">
	//menampilkan masakan
	$.getJSON("<?= base_url()?>index.php/get_masakan",function(data){
		var datanya="";
		$.each(data,function(key,dt){
			datanya+=
			'<p>'+
				'<a href="#detail_masakan" data-toggle="modal" onclick="tm_detail('+dt['id_masakan']+')" class="title" style="text-decoration:none">'+dt['nama_masakan']+'</a>'+
				'<span class="short-description">'+dt['harga']+'</span>'+
			'</p>'+
			'<div class="controls">'+
				'<a href="#"><i class="icon-software icon-software-pencil"></i></a> <a href="#"><i class="icon-arrows icon-arrows-circle-remove"></i></a>'+
			'</div>'
		});
		$('#tampil_masakan').html(datanya);
	});

	//tampil detail masakan
	function tm_detail(id_masakan){
		$.getJSON("<?= base_url()?>index.php/get_masakan/detail/"+id_masakan,function(data){
		$('#deskripsi').html(
			'<table class="table table-hover table-stripped">'+
        		'<tr><td>Nama Masakan</td><td>'+data['nama_masakan']+'</td></tr>'+
        		'<tr><td>Harga</td><td>'+data['harga']+'</td></tr>'+
        		'<tr><td>Status masakan</td><td>'+data['status_masakan']+'</td></tr>'+
      		'</table>'
			);
		$('#no_meja').html(
      		'<label>Nomor Meja</label>'+
      		'<input type="number" id="nomor_meja" value="1" class="form-control">'
      		);
		$('#jumlah').html(
      		'<label>Jumlah</label>'+
      		'<input type="number" id="jumlah_item" value="1" class="form-control">'
      		);
    	$('#btn').html(
        	'<button id="beli" onclick="beli('+data['id_masakan']+')" class="btn btn-info">PESAN</button>'+
        	'<a href="<?= base_url()?>index.php/Transaksi" class="btn btn-danger">CHECK OUT</a>'
      		);
	});
}
	//menambahkan masakan ke chart
	function beli(id_masakan){
		var jumlah=$('#jumlah_item').val();
		var meja=$('#nomor_meja').val();
		$('#pesan').hide();
		$('#pesan').removeClass("alert alert-success");
		$.getJSON("<?= base_url()?>index.php/Transaksi/tambah_cart/"+id_masakan+"/"+jumlah+"/"+meja,function(hasil){
			$('#cart').html(hasil['total_cart']);
			$('#pesan').html("item anda ditambahkan ke cart");
			$('#pesan').addClass('alert alert-success');
			$('#pesan').show('animate');
			setTimeout(function(){
				$('#pesan').hide('fade');
			}, 3000);
		});
	}
</script>