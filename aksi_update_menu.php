<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$name = "restorantubes";


	$conn = mysqli_connect($host, $user, $pass, $name) or die("conn ke database gagal");
	mysqli_select_db($conn, $name) or die('Database tidak ditermukan!');

 
	if (mysqli_connect_errno()){
		echo "conn database gagal : " . mysqli_connect_error();
	}
	if (isset($_POST['submit'])) {

	$id = $_POST['id'];
	$nama_menu = $_POST['nama_menu'];
	$harga = $_POST['harga'];
	
	$sql = "UPDATE menu SET nama_menu='$nama_menu', harga='$harga' WHERE id='$id'";

	if ($conn->query($sql) === TRUE)  {
		header("Location: dashboard.php");
	}else{
        header("Location: dashboard.php");
	}
}else{
	echo '<script>window.history.back()</script>';
}
?>