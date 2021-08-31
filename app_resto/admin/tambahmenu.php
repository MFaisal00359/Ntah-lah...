<?php

require '../functions.php';

//cek apakah tombol tambah data sudah di tekan
if (isset($_POST["submit"]) ) {
	
	//cek apakah berhasil di tambahkan atau tidak
	if (tambah($_POST) > 0 ) {
		echo "
		<script>
			alert('Data berhasil Ditambahkan');
			document.location.href = 'index.php';	
		</script>";
	} else {
		echo "
		<script>
			alert('Data Gagal Ditambahkan ');
			document.location.href = 'index.php';	
		</script>";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Menu</title>
</head>
<body>
	<a href="index.php">--Kembali/Back--</a>
	<h1>Tambah Data Menu</h1>

	<form action="" method="post">
		<table border="0" cellpadding="6" cellspacing="0">
		<tr>
			<td>
				<label requairedfor="namamenu">Nama Menu : </label>
			</td>
			<td>
				<input type="text" name="namamenu" id="namamenu" required>
			</td>
		</tr>
			<td>
				<label for="harga">Harga Per Porsi Rp. </label>
			</td>
			<td>
				<input type="text" name="harga" id="harga" required>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
				<button type="submit" name="submit">Tambah Data!</button>
			</td>
		</tr>
		</table>
	</form>
</body>
</html>