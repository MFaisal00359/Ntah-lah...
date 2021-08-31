<?php 
// session_start();

// //cek apakah tombol Login sudah di tekan
// if(isset($_SESSION["login"])){
// 	header("location: ../index.php");
// 	exit;
// }

require '../functions.php';

//koneksikan database
$conn = mysqli_connect("localhost", "root", "", "dbresto"); 

//ambil data menu dari database
$sqlmenu = "SELECT * FROM menu";
$resultmenu = mysqli_query($conn,$sqlmenu);

//ambil data pelanggan dari database
$sqlpelanggan = "SELECT * FROM pelanggan";
$resultpelanggan = mysqli_query($conn,$sqlpelanggan);


if (isset($_POST["submit"]) ) {
	$idmenu = $_POST["pilihanmenu"];
	$idpelanggan = $_POST["pilihanpelanggan"];
	$jumlah = Htmlspecialchars($_POST["jumlah"]);
	


	 $sql = "INSERT INTO pesanan
	 			VALUES
				('', '$idmenu', '$idpelanggan', '$jumlah', 2)";

	mysqli_query($conn, $sql);

	$data = mysqli_affected_rows($conn);
	//cek apakah berhasil di tambahkan atau tidak
	if ($data > 0 ) {
		echo "
		<script>
			alert('Data pesanan berhasil Ditambahkan');
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

<!DOCTYPE HTML>
<html>
<head>
	<title>Halaman Order</title>
</head>
<body>
	<a href="index.php">--Kembali/Back--</a>
	<h1>Halaman Order</h1>
	<br>

	<form action="" method="post">
		<h4>Silahkan pilih Menu yang telah tersedia :</h4>

		<a href="cekhargamenu.php">Cek Harga Menu</a><br><br>

		<?php if(isset($error)) :?>
			<p style="color: red; font-style: italic;">Menu Belum dipilih !</p>
		<?php endif; ?>

		<label> Menu :</label>
		<select name="pilihanmenu" >
			<option value="" id="nol"></option>
			<?php $nomenu = []; ?>
			 <?php while ($nomenu = mysqli_fetch_array($resultmenu)) :?>
				$nomenu++; 
				<option value="<?php echo $nomenu['idmenu']; ?>"><?php echo $nomenu['namamenu']; ?></option>
			<?php endwhile; ?>
		</select><br><br>

		<label for="jumlah">Jumlah Pesanan : </label>
		<input type="text" name="jumlah" id="jumlah"><label> Porsi</label><br><br>

		<h4>Silahkan Pilih Nama Pelanggan :</h4>

		<?php if(isset($error)) :?>
		<p style="color: red; font-style: italic;">Pelanggan Belum dipilih !</p>
		<?php endif; ?>

		<label> Pelanggan :</label>
		<select name="pilihanpelanggan" >
			<option value="" id="nol"></option>
			<?php $nopelanggan = []; ?>
				<?php while ($nopelanggan = mysqli_fetch_array($resultpelanggan)) :?>
				$nopelanggan++; 
				<option value="<?php echo $nopelanggan['idpelanggan']; ?>"><?php echo $nopelanggan['namapelanggan']; ?></option>
			<?php endwhile; ?>
			</select><br><br>

		<a href="tambahpelanggan.php"> --Tambah Pelanggan Baru--</a><br><br>
		
		<button type="submit" name="submit">Pesan Sekarang!</button>
	
	</form>
</body>
</html>