<?php 
session_start();

//cek apakah tombol login sudah ditekan, jika belum loncat ke form login
if (!isset($_SESSION["login"]) ){
	header("location: ../login.php");
	exit;
}


require "../functions.php";

$menu = query("SELECT * FROM menu");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Utama</title>
</head>
<body>
	
	<table border="0" cellpadding="10" cellspacing="0">
		<tr>
			<td><a href="../logout.php">Logout</a></td>
			<td></td>
			<td><a href="tambahmenu.php">tambah Menu Makanan</a></td>
		</tr>
	</table>
	
	<center><h1>Halo Admin, Selamat datang.</h1></center>
	<center><p>Silahkan cek Menu Makanan / Minuman dibawah ini</p></center>

	<center><table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Nama Menu</th>
			<th>harga</th>
			<th>AKSI</th>
		</tr>

		<?php  $i = 1; ?>
		<?php foreach($menu as $data) : ?>
			<tr>
				<td><?php echo $i; ?></td>
				
				<td><?php echo $data["namamenu"]; ?></td>
				<td>Rp. <?php echo $data["harga"]; ?></td>
				<td>
					<a href="ubahmenu.php?id=<?php echo $data['idmenu'];?>">Ubah</a> |
					<a href="hapus.php?id=<?php echo $data['idmenu'];?>" onclick="return confirm('Apakah anda yakin ?');">Hapus</a>
				</td>
			</tr>
			<?php $i++; ?>	
		<?php endforeach; ?>
	</table></center>

</body>
</html>