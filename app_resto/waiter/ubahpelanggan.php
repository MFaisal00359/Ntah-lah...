<?php

require '../functions.php';

//ambil data dari url
$id = $_GET["id"];

//query data menu berdasarkan idmenu
$pelanggan = query("SELECT * FROM pelanggan WHERE idpelanggan = $id")[0];

//cek apakah tombol tambah data sudah di tekan
if (isset($_POST["submit"]) ) {
	
	//cek apakah berhasil diubah atau tidak
	if (ubahpelanggan($_POST) > 0 ) {
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
	<title>Ubah Data Pelanggan</title>
</head>
<body>
	<a href="index.php">--Kembali/Back--</a>
	<h1>Ubah Data Pelanggan</h1>

	<form action="" method="post">
		<table border="0" cellpadding="6" cellspacing="0">
		<tr>
			<td></td>
			<td>
				<input type="hidden" name="id" value="<?php echo $pelanggan['idpelanggan'];?>">
			</td>
		</tr>
		<tr>
			<td>
				<label for="namapelanggan">Nama Pelanggan : </label>
			</td>
			<td>
				<input type="text" name="namapelanggan" id="namapelanggan" required value="<?php echo $pelanggan['namapelanggan'];?>">
			</td>
		</tr>
		<tr>
			<td>
				<label for="jeniskelamin">Jenis Kelamin : </label>
			</td>
			<td>
				<input type="text" name="jeniskelamin" id="jeniskelamin" required value="<?php echo $pelanggan['jeniskelamin'];?>"> 
			</td>
		</tr>
		<tr>
			<td>
				<label for="nohp">No. HP : </label>
			</td>
			<td>
				<input type="text" name="nohp" id="nohp" required value="<?php echo $pelanggan['nohp'];?>"> 
			</td>
		</tr>
		<tr>
			<td>
				<label for="alamat">Alamat : </label>
			</td>
			<td>
				<input type="text" name="alamat" id="alamat" required value="<?php echo $pelanggan['alamat'];?>"> 
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