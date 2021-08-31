<?php 

require '../functions.php';

$id = $_GET["id"];

if (hapuspelanggan($id) > 0 ) {
	echo "
		<script>
			alert('data Telah Dihapus!');
			document.location.href = 'index.php';
		</script>
		 ";
} else {
	echo "
		<script>
			alert('data Gagal Dihapus!');
			document.location.href = 'index.php';
		</script>
	 	";
}

?>