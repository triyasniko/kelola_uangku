<div class="row">
	<div class="col-md-12">
		<h4 class="page-head-line">Data Uang Masuk</h4>   
		<div class="panel panel-success">
			<div class="panel-body">
				  <table class="table table-striped table-responsive" id="dataTable">
				    <thead>
				      <tr>
				      	<th>No.</th>
				        <th>Kode</th>
				        <th>Tanggal</th>
				        <th>Keterangan</th>
				        <th>Jumlah</th>
				        <th>Aksi</th>
				      </tr>
				    </thead>
				    <tbody>
				    <?php 
				    	$total=0;
				    	$no=1;
				    	$sql=$koneksi->query("SELECT*FROM tb_transaksi WHERE jenis='masuk' ");
				    	while ($data=$sql->fetch_assoc()) {
				    	
				    ?>
				      <tr>
				        <td><?php echo $no++; ?></td>
				        <td><?php echo $data['kode']; ?></td>
				        <td><?php echo date('d F Y',strtotime($data['tgl'])); ?></td>
				        <td class="center"><?php echo $data['keterangan']; ?></td>
				        <td>Rp. <?php echo number_format($data['jumlah']).",-"; ?></td>
				        <td>
				        	<a id="edit_data" data-id="<?php echo $data['kode']; ?>" data-ket="<?php echo $data['keterangan']; ?>" data-tgl="<?php echo $data['tgl']; ?>" data-jml="<?php echo $data['jumlah']; ?>" data-toggle="modal" data-target="#edit" class="btn btn-warning">Edit</a>
				        	<a onclick="return confirm('Yakin mau dihapus?')" href="?page=masuk&aksi=hapus&id=<?php echo $data['kode']; ?>" class="btn btn-danger">Hapus</a>
				        </td>
				      </tr>
				    <?php 
				    	$total=$total+$data['jumlah'];
				    	}
				    ?>
				    </tbody>
				    <tr>
				    	<th colspan="4">Total Uang Masuk : </th>
				    	<td colspan="2">
				    		<strong>Rp. <?php echo number_format($total); ?></strong>
				    	</td>
				    </tr>
				  </table>
			</div>
			<!-- modal tambah data -->
			<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Tambah Data</button>
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
				    <div class="modal-content">
				    	<div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        	<h4 class="modal-title">Form Tambah Data</h4>
				    	</div>
				    	<form role="form" method="post">
				    	<div class="modal-body">
				      		<div class="form-group">
				      			<label>Kode</label>
				      			<input class="form-control" type="text" name="kode">
				      		</div>
				      		<div class="form-group">
				      			<label>Keterangan</label>
				      			<textarea class="form-control" rows="3" name="ket"></textarea>
				      		</div>
				      		<div class="form-group">
				      			<label>Tanggal</label>
				      			<input class="form-control" type="date" name="tgl">
				      		</div>
				      		<div class="form-group">
				      			<label>Jumlah</label>
				      			<input class="form-control" type="number" name="jml">
				      		</div>
				    	</div>
				    	<div class="modal-footer">
				    		<input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				    	</div>
				    	</form>
				    	<?php 
							if (isset($_POST['simpan'])) {
								$kode=$_POST["kode"];
								$ket=$_POST["ket"];
								$tgl=$_POST["tgl"];
								$jml=$_POST["jml"];

								$sql=$koneksi->query("INSERT INTO tb_transaksi 
									(kode,keterangan,tgl,jumlah,jenis,keluar) 
								VALUES('$kode','$ket','$tgl','$jml','masuk',0)")or die(mysqli_error($koneksi));

								if ($sql) {
									?>
									<script type="text/javascript">
										alert("Data Berhasil ditambahkan!!");
										window.location.href="?page=masuk";
									</script>
									<?php
								}
							}
						 ?>
				    </div>
			 	</div>
			</div>
			<!-- akhir modal -->
			<!-- modal ubah data -->
			<div id="edit" class="modal fade" role="dialog">
				<div class="modal-dialog">
				    <div class="modal-content">
				    	<div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        	<h4 class="modal-title">Form Ubah Data</h4>
				    	</div>
				    	<form role="form" method="post">
				    	<div class="modal-body" id="modal_edit">
				      		<div class="form-group">
				      			<label>Kode</label>
				      			<input class="form-control" type="text" name="kode" id="kode" readonly>
				      		</div>
				      		<div class="form-group">
				      			<label>Keterangan</label>
				      			<textarea class="form-control" rows="3" name="ket" id="ket"></textarea>
				      		</div>
				      		<div class="form-group">
				      			<label>Tanggal</label>
				      			<input class="form-control" type="date" name="tgl" id="tgl">
				      		</div>
				      		<div class="form-group">
				      			<label>Jumlah</label>
				      			<input class="form-control" type="number" name="jml" id="jml">
				      		</div>
				    	</div>
				    	<div class="modal-footer">
				    		<input type="submit" name="ubah" class="btn btn-primary" value="Simpan">
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
				    	</div>
				    	</form>
				    	<?php 
							if (isset($_POST['ubah'])) {
								$kode=$_POST["kode"];
								$ket=$_POST["ket"];
								$tgl=$_POST["tgl"];
								$jml=$_POST["jml"];

								$sql=$koneksi->query("UPDATE tb_transaksi SET
									keterangan='$ket',tgl='$tgl',jumlah='$jml',jenis='masuk',keluar=0 WHERE kode='$kode' ")or die(mysqli_error($koneksi));

								if ($sql) {
									?>
									<script type="text/javascript">
										alert("Data Berhasil diubah!!");
										window.location.href="?page=masuk";
									</script>
									<?php
								}
							}
						 ?>
				    </div>
			 	</div>
			</div>
			<!-- akhir modal -->
			
		</div>
	</div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script type="text/javascript">
	$(document).on("click","#edit_data",function(){
		var kode=$(this).data('id');
		var ket=$(this).data('ket');
		var tgl=$(this).data('tgl');
		var jml=$(this).data('jml');

		$("#modal_edit #kode").val(kode);
		$("#modal_edit #ket").val(ket);
		$("#modal_edit #tgl").val(tgl);
		$("#modal_edit #jml").val(jml);
	});
</script>