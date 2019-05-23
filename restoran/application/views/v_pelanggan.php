<section class="wrapper">
<div class="block-header">
<h3 style="text-align: center">Daftar Pelanggan</h3>
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
                                  <th>ID Pelanggan</th>
                                  <th>Nama Pelanggan</th>
                                  <th>Alamat</th>
                                  <th>No Telp</th>
                                  <th>Username</th>
                                  <th>Password</th>
                                  <th>Aksi</th>
                            		</tr>
                                    <?php
                                    $no=0;
                                    foreach ($data_pelanggan as $dt_pel) {
                                      $no++;
                                      echo'<tr>
                                        <td>'.$no.'</td>
                                        <td>'.$dt_pel->id_pelanggan.'</td>
                                        <td>'.$dt_pel->nama.'</td>
                                        <td>'.$dt_pel->alamat.'</td>
                                        <td>'.$dt_pel->telp.'</td>
                                        <td>'.$dt_pel->username.'</td>
                                        <td>'.$dt_pel->password.'</td>
                                        <td><a href="#update_pelanggan" class="btn btn-warning"I data-toggle="modal" onclick="tm_detail('.$dt_pel->id_pelanggan.')">Ubah</a> <a href="'.base_url('index.php/pelanggan/deletePelanggan/'.$dt_pel->id_pelanggan).'" class="btn btn-danger"I data-toggle="modal" onclick="return confirm(\'apakah anda ingin menghapus?\')">Hapus</a></td>
                                    </tr>';  
                                    }
                            		?>
                            		</table>
                                <?php if ($this->session->flashdata('pesan')!=null): ?>
                                 <div class="alert alert-danger"><?= $this->session->flashdata('pesan');?></div>    
                                <?php endif ?>


                            </div>
                          </div>
                        </div><!-- /col-md-4 -->
                                
                        
                    </div>
                        
                            	
                </div>
            </div>
        </div>
      </div>
    </div>
    </div>
        <div class="modal fade"id="tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Tambah Pelanggan</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/pelanggan/simpan_pelanggan')?>" method="post">
        Nama Pelanggan
        <input type="text" name="nama" class="form-control"><br>
        Alamat
        <input type="text" name="alamat" class="form-control"><br>
        No Telp
        <input type="text" name="telp" class="form-control"><br>
        Username
        <input type="text" name="username" class="form-control"><br>
        Password
        <input type="text" name="password" class="form-control"><br>
        
        </select>
        <br>
        <br>  
        <input type="submit" name="simpan" value="simpan" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
              
        </select>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

        <div class="modal fade"id="update_pelanggan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Update Barang</h4>
      </div>
      <div class="modal-body">
        <form action="<?=base_url('index.php/pelanggan/update_pelanggan')?>" method="post">
        <input type="hidden" name="id_pelanggan" id="id_pelanggan">
        Nama Pelanggan
        <input type="text" id="nama" name="nama" class="form-control"><br>
        Alamat
        <input type="text"id="alamat" name="alamat" class="form-control"><br>
        No Telp
        <input type="text" id="telp" name="telp" class="form-control"><br>
        Username
        <input type="text" id="username" name="username" class="form-control"><br>
        Password
        <input type="text" id="password" name="password" class="form-control"><br>
        <br>
        <br>  
        <input type="submit" name="simpan" value="simpan" class="btn btn-success">
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
              
        </select>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
  function tm_detail(id_pelanggan){
    $.getJSON("<?=base_url()?>index.php/pelanggan/detail_pelanggan/"+id_pelanggan,function(data){
      $("#id_pelanggan").val(data['id_pelanggan']);
      $("#nama").val(data['nama']);
        $("#alamat").val(data['alamat']);
        $("#telp").val(data['telp']);
         $("#username").val(data['username']);
         $("#password").val(data['password']);
    });
  }
</script>
</section>