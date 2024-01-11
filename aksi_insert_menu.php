<?php 
$conn = mysqli_connect("localhost", "root", "", "restorantubes") or die("Gagal conn Database");
	$nama_menu = $_POST['nama_menu'];
	$harga = $_POST['harga'];
	



	$query="INSERT INTO menu VALUES('', '$nama_menu', '$harga')";
	$sql = mysqli_query($conn,$query) or die("Gagal input:".$query);

	
	header("location:dashboard.php");
?>