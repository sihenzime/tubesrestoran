<?php

$host = "localhost";
$user = "root";
$pass = "";
$name = "restorantubes";

$conn = mysqli_connect($host, $user, $pass, $name) or die("Koneksi ke database gagal");
mysqli_select_db($conn, $name) or die('Database is not found!');



function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$row = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
    return $rows;
}

function registrasi($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$email = strtolower(stripslashes($data["email"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);


    // cek username sudah ada atau belum
    $sql = "SELECT email FROM admin WHERE email = '$email'";
    $result = $conn->query($sql);
    
      if ( mysqli_fetch_assoc($result) ) {
      	   echo "<script>
      	         alert('email sudah ada')
      	         </script>";
      	    return false;     
      }

	// cek konfirmasi password
	if ($password !== $password2) {
		echo "<script>
		        alert('konfirmasi password tidak sesuai!')
		      </script>";
		return false;      
      }


      // enkripsi password
      $password = password_hash($password, PASSWORD_DEFAULT);

      // tambah user bari ke database
      $sql = "INSERT INTO admin VALUES(NULL, '$username', '$email', '$password')";
		if (mysqli_query($conn, $sql)) {
			    
			} 

      return mysqli_affected_rows($conn);
      mysql_close($conn);
}


function registrasimember($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$email = strtolower(stripslashes($data["email"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $sql = "SELECT email FROM member WHERE email = '$email'";
    $result = $conn->query($sql);
    
      if ( mysqli_fetch_assoc($result) ) {
      	   echo "<script>
      	         alert('email sudah ada')
      	         </script>";
      	    return false;     
      }


	if ($password !== $password2) {
		echo "<script>
		        alert('konfirmasi password tidak sesuai!')
		      </script>";
		return false;      
      }
      $password = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO member VALUES(NULL, '$username', '$email', '$password')";
		if (mysqli_query($conn, $sql)) {
			    
			} 
      return mysqli_affected_rows($conn);
      mysql_close($conn);
}

?>