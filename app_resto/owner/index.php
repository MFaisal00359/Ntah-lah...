<?php 
session_start();

//cek apakah tombol login sudah ditekan, jika belum loncat ke form login
if (!isset($_SESSION["login"]) ){
	header("location: ../login.php");
	exit;
}


require "../functions.php";

$DataTransaksi = query("SELECT transaksi.idtransaksi AS No, pesanan.idpesanan AS NoPesanan, pelanggan.namapelanggan AS NamaPelanggan, pelanggan.nohp AS NoHP, menu.namamenu AS NamaMenu, menu.harga AS HargaMenu, pesanan.jumlah AS JumlahPesan, transaksi.total AS TotalHarusBayar, transaksi.bayar AS SudahBayar FROM transaksi, pesanan, menu, pelanggan WHERE pesanan.idpesanan = transaksi.idpesanan AND pesanan.idmenu = menu.idmenu AND pesanan.idpelanggan = pelanggan.idpelanggan");

?>

<!DOCTYPE html>
<html>
<head>
	<center><title>Halaman Utama</title></center>
</head>
<body>
	
	<table border="0" cellpadding="10" cellspacing="0">
		<tr>
			<td><a href="../logout.php">Logout</a></td>
		</tr>
	</table>
	
	<center><h1>Halo Boss, Selamat datang .</h1></center>
	<center><h3>...Terima Kasih telah mengunjungi kami...</h3></center>

	<center><p>Daftar Transaksi Pemesanan AIDA RESTO </p></center>

	<center><table border="1" cellpadding="10" cellspacing="1">
		<tr>
			<th>No.</th>
			<th>No Pesanan</th>
			<th>Nama Pelanggan</th>
			<th>No. HP</th>
			<th>Nama Menu</th>
			<th>Harga Menu</th>
			<th>Jumlah Pesan</th>
			<th>Total yang Harus Dibayar (Rp)</th>
			<th>Sudah Bayar (Rp)</th>

		</tr>

		<?php  $i = 1; 
		       $keuntungan = 0;
		       ?>
		<?php foreach($DataTransaksi as $data) : ?>
			<tr>
				<td><?php echo $i; ?></td> 
				<td><?php echo $data["NoPesanan"]; ?></td>
				<td><?php echo $data["NamaPelanggan"]; ?></td>
				<td><?php echo $data["NoHP"]; ?></td>
				<td><?php echo $data["NamaMenu"]; ?></td>
				<td><?php echo $data["HargaMenu"]; ?></td>
				<td><?php echo $data["JumlahPesan"]; ?></td>
				<td><?php echo 0 ?></td>
				<td><?php echo $data["SudahBayar"]; ?></td>
			</tr>
			<?php $i++; ?>	
			<?php $keuntungan = $keuntungan + $data["SudahBayar"]; ?>	
		<?php endforeach; ?>
	</table></center>
	<br>
	<center><p> -->>Total Keuntungan Didapat : Rp. <?php echo "$keuntungan"; ?> <<-- </p></center>

</body>
</html>