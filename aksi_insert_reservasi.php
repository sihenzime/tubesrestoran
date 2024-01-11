<?php 
$conn = mysqli_connect("localhost", "root", "", "restorantubes") or die("Gagal conn Database");
	$member_id = $_POST['member_id'];
	$email = $_POST['email'];
	$waktu = $_POST['waktu'];
	$jumlah_orang = $_POST['jumlah_orang'];
	$note = $_POST['note'];
	



	$query="INSERT INTO reservasi VALUES('', '$member_id', '$email', '$waktu', '$jumlah_orang', '$note')";
	$sql = mysqli_query($conn,$query) or die("Gagal input:".$query);

	
	header("location:index.php");
?>