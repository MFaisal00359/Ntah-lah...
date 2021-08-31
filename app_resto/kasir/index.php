<?php 
session_start();

//cek apakah tombol login sudah ditekan, jika belum loncat ke form login
if (!isset($_SESSION["login"]) ){
	header("location: ../login.php");
	exit;
}


require "../functions.php";

$DataTransaksi = query("SELECT pesanan.idpesanan AS NoPesanan, pelanggan.namapelanggan AS NamaPelanggan, menu.namamenu AS NamaMenu, menu.harga AS HargaMenu, pesanan.jumlah AS JumlahPorsi, menu.harga*pesanan.jumlah AS TotalHarusBayar FROM pesanan, pelanggan, menu WHERE pesanan.idmenu = menu.idmenu AND pesanan.idpelanggan = pelanggan.idpelanggan");

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
	
	<center><h1>Halo Kru Kasir - AIDA Resto, Selamat datang .</h1></center>
	<center><h3>...Semangat bekerja !...</h3></center>

	<center><p>Daftar Pesanan dari Kru Waiter </p></center>

	<center><table border="1" cellpadding="10" cellspacing="1">
		<tr>
			<th>No Urut</th>
			<th>No Pesanan</th>
			<th>Nama Pelanggan</th>
			<th>Nama Menu</th>
			<th>Harga Menu</th>
			<th>Jumlah Porsi</th>
			<th>Total yang Harus Dibayar (Rp)</th>
			<th>AKSI</th>
		</tr>

		<?php  $i = 1; ?>
		<?php foreach($DataTransaksi as $data) : ?>
			<tr>
				<td><?php echo $i; ?></td> 
				<td><?php echo $data["NoPesanan"]; ?></td>
				<td><?php echo $data["NamaPelanggan"]; ?></td>
				<td><?php echo $data["NamaMenu"]; ?></td>
				<td><?php echo $data["HargaMenu"]; ?></td>
				<td><?php echo $data["JumlahPorsi"]; ?></td>
				<td><?php echo $data["TotalHarusBayar"]; ?></td>
				<td>
				<?php $idp = $data['NoPesanan'];
				if (cekdata($idp)>0)  { ?>
  						<a href=""></a>>Sudah Bayar</a>
		   <?php } else { ?> 
						<a href="bayar.php?tb=<?php echo $data['TotalHarusBayar'];?>&id=<?php echo $idp;?>">Lakukan Pembayaran</a>
			  <?php } ?>
					
				</td>
			</tr>
			<?php $i++; ?>	
		<?php endforeach; ?>
	</table></center>

	</form>
</body>
</html>