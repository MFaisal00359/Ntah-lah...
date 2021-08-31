<?php

$conn = mysqli_connect("localhost", "root", "", "dbresto"); 

//ambil data dari url
$tb = $_GET["tb"];
$id = $_GET["id"];

$sql = "INSERT INTO Transaksi
				VALUES
				('', '$id', '$tb', '$tb')";
				
mysqli_query($conn, $sql);

$tambah = mysqli_affected_rows($conn);
//cek apakah berhasil diubah atau tidak
if ($tambah > 0 ) {
	echo "
	<script>
		alert('Pembayaran Berhasil');
		document.location.href = 'index.php';	
	</script>";
} else {
	echo "
	<script>
		alert('Pembayaran Gagal! ');
		document.location.href = 'index.php';	
	</script>";
}

?>
