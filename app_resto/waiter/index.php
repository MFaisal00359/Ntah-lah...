<?php 
session_start();

//cek apakah tombol login sudah ditekan, jika belum loncat ke form login
if (!isset($_SESSION["login"]) ){
	header("location: ../login.php");
	exit;
}


require "../functions.php";

$pelanggan = query("SELECT * FROM pelanggan");

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
			<td></td>
			<td><a href="tambahpelanggan.php">Tambah Data Pelanggan</a></td>
		</tr>
	</table>
	
	<center><h1>Halo Kru Waiter - AIDA Resto, Selamat datang .</h1></center>
	<center><h3>...Semangat bekerja !...</h3></center>

	<center><p>Daftar data pelanggan </p></center>

	<center><table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>AKSI</th>
			<th>Nama Pelanggan</th>
			<th>Jenis Kelamin</th>
			<th>No. HP</th>
			<th>Alamat</th>

		</tr>

		<?php  $i = 1; ?>
		<?php foreach($pelanggan as $data) : ?>
			<tr>
				<td><?php echo $i; ?></td> 

				<td>
					<a href="ubahpelanggan.php?id=<?php echo $data['idpelanggan'];?>">Ubah</a> |
					<a href="hapuspelanggan.php?id=<?php echo $data['idpelanggan'];?>" onclick="return confirm('Apakah anda yakin ?');">Hapus</a>
				</td>

				<td><?php echo $data["namapelanggan"]; ?></td>
				<td><?php echo $data["jeniskelamin"]; ?></td>
				<td><?php echo $data["nohp"]; ?></td>
				<td><?php echo $data["alamat"]; ?></td>

			</tr>
			<?php $i++; ?>	
		<?php endforeach; ?>
	</table></center>
	<br>
	<center><a href="order.php"> --Klik disini untuk Order Makanan-- </a></center>
</body>
</html>