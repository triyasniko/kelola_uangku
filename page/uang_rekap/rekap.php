<div class="row">
	<div class="col-md-12">
		<h4 class="page-head-line">Data Uang Keluar</h4>   
		<div class="panel panel-success">
			<div class="panel-body">
				  <table class="table table-striped table-responsive" id="dataTable">
				    <thead>
				      <tr>
				      	<th>No.</th>
				        <th>Kode</th>
				        <th>Tanggal</th>
				        <th>Keterangan</th>
				        <th>Masuk</th>
				        <th>Jenis</th>
				        <th>Keluar</th>
				      </tr>
				    </thead>
				    <tbody>
				    <?php 
				    	$total=0;
				    	$no=1;
				    	$sql=$koneksi->query("SELECT*FROM tb_transaksi");
				    	while ($data=$sql->fetch_assoc()) {
				    	
				    ?>
				      <tr>
				        <td><?php echo $no++; ?></td>
				        <td><?php echo $data['kode']; ?></td>
				        <td><?php echo date('d F Y',strtotime($data['tgl'])); ?></td>
				        <td><?php echo $data['keterangan']; ?></td>
				        <td>Rp. <?php echo number_format($data['jumlah']).",-"; ?></td>
				        <td><?php echo $data['jenis']; ?></td>
				        <td>Rp. <?php echo number_format($data['keluar']).",-"; ?></td>
				      </tr>
				    <?php 
				    	$total=$total+$data['jumlah'];
				    	$total_keluar=$total_keluar+$data['keluar'];
				    	$saldo_akhir=$total-$total_keluar;
				    	}
				    ?>
				    </tbody>
				    <tr>
				    	<td colspan="7"><br></td>
				    </tr>
				    <tr>
				    	<th colspan="4">Total Uang Masuk : </th>
				    	<td colspan="2">
				    		<strong>Rp. <?php echo number_format($total); ?></strong>
				    	</td>
				    </tr>
				    <tr>
				    	<th colspan="4">Total Uang Keluar : </th>
				    	<td colspan="2">
				    		<strong>Rp. <?php echo number_format($total_keluar); ?></strong>
				    	</td>
				    </tr>
				    <tr>
				    	<th colspan="4">Saldo Akhir : </th>
				    	<td colspan="2">
				    		<strong>Rp. <?php echo number_format($saldo_akhir); ?></strong>
				    	</td>
				    </tr>
				  </table>
			</div>
		</div>
	</div>
</div>