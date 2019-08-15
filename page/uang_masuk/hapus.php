<?php 
	$id=$_GET['id'];
	$sql=$koneksi->query("DELETE FROM tb_transaksi WHERE kode='$id' ")or die(mysqli_error($koneksi));

	if ($sql) {
		?>
		<script type="text/javascript">
			alert("Data Berhasil dihapus!!");
			window.location.href="?page=masuk";
		</script>
		<?php
	}

?>