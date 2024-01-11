<?php
	$conn = mysqli_connect("localhost", "root", "", "restorantubes") or die("Gagal conn Database");
	$id = $_GET['id'];
	$query = "SELECT * FROM menu WHERE id = '$id'";
	$data = mysqli_query($conn,$query) or die("Gagal Menampilkan:".$query);
	$sql = mysqli_fetch_array($data);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RESTORAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"> </script>
<nav class="navbar navbar-expand-lg " style="background-color: lightblue;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">DASHBOARD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="dashboard.php">Halaman Utama</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Edit Data Buku -->
<br>
	<div>
		<center>
      <h3>Edit Menu</h3>
		<form action="aksi_update_menu.php" method="POST" style="width: 80%;" >
			<div class="mb-3">
			  <input type="number" name="id" placeholder="No Buku" class="form-control" id="exampleFormControlInput1" hidden="" value="<?php echo $sql['id'];?>">
			  <input type="text" name="nama_menu" placeholder="Nama Menu" class="form-control" id="exampleFormControlInput1" required="" value="<?php echo $sql['nama_menu'];?>">
			  <input type="text" name="harga" placeholder="Harga" class="form-control" id="exampleFormControlInput1" required="" value="<?php echo $sql['harga'];?>">
			<br/>
			<input type="submit" name="submit" value="Tambah Buku" class="btn btn-primary"  onclick="return confirm('Apakah Data akan disimpan?')">
			</div>
		</form>
		</center>
	</div>
</body>
</html>
