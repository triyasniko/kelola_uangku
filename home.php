<?php 
	$sql=$koneksi->query("SELECT*FROM tb_transaksi");
	while ($data=$sql->fetch_assoc()) {
		$jml=$data['jumlah'];
		$total_masuk=$total_masuk+$jml;

		$jml_keluar=$data['keluar'];
		$total_keluar=$total_keluar+$jml_keluar;

		$total=$total_masuk-$total_keluar;
	}
 ?>
<h4 class="page-head-line">Dashboard</h4>            
<div class="row text-center">
	<div class="col-md-6 col-sm-6 col-xs-6">           
		<div class="panel panel-info">
			<span class="icon-box bg-color-red set-icon">
				<i class="fa fa-envelope-o"></i>
			</span>
			<div class="text-box" >
				<p class="main-text">Rp. <?php echo number_format($total_masuk); ?></p>
				<p class="text-muted">Total Uang Masuk</p>
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-6 col-xs-6">           
		<div class="panel panel-info">
			<span class="icon-box bg-color-green set-icon">
				<i class="fa fa-money"></i>
			</span>
			<div class="text-box" >
				<p class="main-text">Rp. <?php echo number_format($total_keluar); ?></p>
				<p class="text-muted">Total Uang Keluar</p>
			</div>
		</div>
	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">           
		<div class="panel panel-info" style="min-height: 200px;padding-top: 30px;">
			<span class="icon-box bg-color-brown set-icon">
				<i class="fa fa-rocket"></i>
			</span>
			<div class="text-box" >
				<p class="main-text">Rp. <?php echo number_format($total); ?></p>
				<p class="text-muted">Saldo Akhir</p>
			</div>
		</div>
	</div>
</div>