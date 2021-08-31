<?php 
//hidupkan koneksi
require '../functions.php';

//ambil data menu makanan
$menu = query("SELECT * FROM menu");

?>

<!DOCTYPE html>
<html>
<head>
	<title>APLIKASI Kasir AIDA Resto</title>

</head>
<body>
	<a href="order.php">--Kembali ke halaman Order--</a>
	<!-- Judul halaman-->
	<center><h1>Selamat Datang di AIDA Resto</h1></center>
	<center><p>Daftar Menu Saat ini</p></center>
	<!-- Tabel Menu -->
	<center><table border="1" cellpadding="10" cellspacing="0">
		<!-- Header Tabel-->
		<tr>
			<th>No.</th>
			<th>Nama Menu</th>
			<th>harga</th>
		</tr>
		<!-- Tampilkan data-data menu dari database-->
		<?php $i = 1; ?>
		<?php foreach($menu as $data) : ?>
			<tr>
				<td><?php echo $i; ?></td>
				<td><?php echo $data["namamenu"]; ?></td>
				<td>Rp. <?php echo $data["harga"]; ?></td>
			</tr>
			<?php $i++; ?>	
		<?php endforeach; ?>
	</table></center>


</body>
</html>