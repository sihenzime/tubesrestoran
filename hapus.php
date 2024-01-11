<?php 
	$conn = mysqli_connect("localhost", "root", "", "restorantubes") or die("Gagal conn Database");
	$id = $_GET['id'];
	$query="DELETE FROM menu WHERE id='$id'";
	$sql = mysqli_query($conn,$query) or die("Gagal input:".$query);
	header("location:dashboard.php");
?>