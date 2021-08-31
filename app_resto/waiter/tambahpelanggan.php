<?php

//memanggil fungsi
require '../functions.php';


//cek apakah tombol tambah data sudah di tekan
if (isset($_POST["submit"]) ) {
	
	//cek apakah berhasil di tambahkan atau tidak
	if (tambahpelanggan($_POST) > 0 ) {
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
	<title>Tambah Data Pelanggan</title>
</head>
<body>
	<a href="index.php">--Kembali/Back--</a>
	<h1>Tambah Data Pelanggan</h1>

	<form action="" method="post">
		<ul>
			<li>
				<label for="namapelanggan">Nama Pelanggan :</label>
				<input type="text" name="namapelanggan" id="namapelanggan">
			</li>
			<li>
				<input type="radio" name="jeniskelamin" value="pria"><label for="pria">Pria</label>
				<input type="radio" name="jeniskelamin" value="wanita"><label for="wanita">Wanita</label>
			</li>
			<li>
				<label for="nohp">No. HP :</label>
				<input type="text" name="nohp" id="nohp">
			</li>
			<li>
				<label for="alamat">Alamat :</label>
				<input type="text" name="alamat" id="alamat">
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data!</button>
			</li>
		</ul>
	</form>
</body>
</html>