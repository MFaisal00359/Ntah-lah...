<?php 
session_start();

// koneksi 
require 'functions.php';

//cek apakah tombol logi sudah di tekan
if(isset($_SESSION["login"])){
	header("location: index.php");
	exit;
}

if (isset($_POST["login"])) {
	$namauser = $_POST["pilihanuser"];
	if ($namauser == "1"){
		$_SESSION["login"] = true;
		header("location: admin/index.php");
		exit;
	} elseif($namauser == "2") {
			$_SESSION["login"] = true;
			header("location: waiter/index.php ");
			exit;
	} elseif($namauser == "3") {
			$_SESSION["login"] = true;
			header("location: kasir/index.php ");
			exit;
	} elseif($namauser == "4") {
			$_SESSION["login"] = true;
			header("location: owner/index.php ");
			exit;

	}
	$error = true;
}

//koneksikan database
$conn = mysqli_connect("localhost", "root", "", "dbresto"); 

//ambil data user dari database
$sql = "SELECT * FROM user";
$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
</head>
<body>
	<a href="index.php">--Kembali/Back--</a>
	<center><h1>Halaman Login</h1></center>
	<center><h3>Silahkan login untuk mengakses fitur-fitur aplikasi</h2></center>
	<center><h4>Pilihlah salah satu User berikut:</h4></center>

	<?php if(isset($error)) :?>
		<p style="color: red; font-style: italic;">User Belum dipilih !</p>
	<?php endif; ?>

	<center><form action="" method="post">
		<select name="pilihanuser" >
			<option value="" id="nol">Pilih User</option>
			<?php $no = []; ?>
			 <?php while ($no = mysqli_fetch_array($result)) :?>
				$no++
				<option value="<?php echo $no['iduser']; ?>"><?php echo $no['namauser']; ?></option>
			<?php endwhile; ?>
		</select>

		<button type="submit" name="login">Login!</button>
		<br>
	</form>
	</center>
</body>
</html>
