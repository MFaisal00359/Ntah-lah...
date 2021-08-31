<?php

require '../functions.php';

//ambil data dari url
$id = $_GET["id"];

//query data menu berdasarkan idmenu
$menu = query("SELECT * FROM menu WHERE idmenu = $id")[0];

//cek apakah tombol tambah data sudah di tekan
if (isset($_POST["submit"]) ) {
	
	//cek apakah berhasil diubah atau tidak
	if (ubah($_POST) > 0 ) {
		echo "
		<script>
			alert('Data berhasil Diubah');
			document.location.href = 'index.php';	
		</script>";
	} else {
		echo "
		<script>
			alert('Data Gagal Diubah ');
			document.location.href = 'index.php';	
		</script>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<a href="index.php">--Kembali/Back--</a>
	<title>Ubah Data Menu</title>
</head>
<body>
	<h1>Ubah Data Menu</h1>

	<form action="" method="post">
		<table border="0" cellpadding="6" cellspacing="0">
		<tr>
			<td></td>
			<td>
				<input type="hidden" name="id" value="<?php echo $menu['idmenu'];?>">
			</td>
		</tr>
		<tr>
			<td>
				<label for="namamenu">Nama Menu : </label>
			</td>
			<td>
				<input type="text" name="namamenu" id="namamenu" required value="<?php echo $menu['namamenu'];?>">
			</td>
		</tr>
			<td>
				<label for="harga">Harga Per Porsi Rp. </label>
			</td>
			<td>
				<input type="text" name="harga" id="harga" required value="<?php echo $menu['harga'];?>"> 
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<button type="submit" name="submit">Ubah Data!</button>
			</td>
		</tr>
		</table>
	</form>
</body>
</html>