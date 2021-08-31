<?php 

// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "dbresto"); 

//  ambil data dari database 
function query($query){
	global $conn;
	$result = mysqli_query($conn,$query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)){
		$rows[] = $row; 
	}
	return $rows;
}

function tambah($data){
	global $conn;

	$namamenu = htmlspecialchars($data["namamenu"]);
	$harga = Htmlspecialchars($data["harga"]);

	$sql = "INSERT INTO menu
				VALUES
				('', '$namamenu', '$harga')";

	mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
}


function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM menu WHERE idmenu = $id");

	return mysqli_affected_rows($conn);
}


function ubah($data){
		global $conn;
	$id = $data["id"];
	$namamenu = htmlspecialchars($data["namamenu"]);
	$harga = Htmlspecialchars($data["harga"]);

	$sql = "UPDATE menu SET 
				namamenu = '$namamenu',
				harga = '$harga' WHERE idmenu = $id
			";

	mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
}


function tambahpelanggan($data){
	global $conn;

	$namapelanggan = htmlspecialchars($data["namapelanggan"]);
	$jeniskelamin = $data["jeniskelamin"];
	$nohp = Htmlspecialchars($data["nohp"]);
	$alamat = Htmlspecialchars($data["alamat"]);


	$sql = "INSERT INTO pelanggan
				VALUES
				('', '$namapelanggan', '$jeniskelamin', '$nohp', '$alamat')";

	mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
}


function ubahpelanggan($data){
	global $conn;

	$id = $data["id"];

	$namapelanggan = htmlspecialchars($data["namapelanggan"]);
	$jeniskelamin = Htmlspecialchars($data["jeniskelamin"]);
	$nohp = Htmlspecialchars($data["nohp"]);
	$alamat = Htmlspecialchars($data["alamat"]);

	$sql = "UPDATE pelanggan SET 
				namapelanggan = '$namapelanggan',
				jeniskelamin = '$jeniskelamin',
				nohp = '$nohp',
				alamat = '$alamat' WHERE idpelanggan = $id
			";

	mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
}


function hapuspelanggan($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM pelanggan WHERE idpelanggan = $id");

	return mysqli_affected_rows($conn);
}



function cekdata($data){
	global $conn;
    $idp = $data;
	$sql = "SELECT * FROM Transaksi WHERE idpesanan = $idp";

	mysqli_query($conn, $sql);

	return mysqli_affected_rows($conn);
}

?>