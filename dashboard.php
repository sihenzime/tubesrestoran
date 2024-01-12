<?php 
$conn =mysqli_connect("localhost","root", "", "restorantubes") or die("Gagal koneksi ke Database");
  
session_start();
    function isUserLoggedIn() {
    return isset($_SESSION['username']);
}

if (isUserLoggedIn()) {
      
    } else {
      header("Location: adminsignin.php");
      exit;
    }

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
    <a class="navbar-brand" href="dashboard.php">DASHBOARD Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="datareservasi.php">Data Reservasi</a>
        </li> 
        <li class="nav-item">
          <?php 
		      if (isUserLoggedIn()) {
		        echo "<a class='nav-link' href='logout.php' class='w3-bar-item w3-button'><i class='fa fa-off'></i> Logout</a>";
		      }
		      ?>
        </li>
      </ul>
    </div>
  </div>
</nav>

 <div>
 	<center><h2>Tambah Menu</h2></center>
 	<form action="aksi_insert_menu.php" method="POST" style="width: 100%;" >
			<div class="mb-3">
			  <input type="text" name="nama_menu" placeholder="Nama Menu" class="form-control" id="exampleFormControlInput1" required="">

			  <input type="number" name="harga" placeholder="harga" class="form-control" id="exampleFormControlInput1" required="">
			  
			<br/>
			<center>
				<input type="submit" name="submit" value="Tambah Menu" class="btn btn-primary"  onclick="return confirm('Apakah Data akan disimpan?')">
			</center>
			</div>
		</form>
 </div>
 <div>
 	<table class="table table-striped">
  		<thead>
		    <tr>
		      <th scope="col">Id </th>
		      <th scope="col">Nama</th>
		      <th scope="col">Harga</th>
		      <th scope="col">Aksi</th>
		    </tr>
		</thead>
		<tbody>
		    <?php 
		      $query = "SELECT * FROM menu ORDER BY nama_menu asc";
		      $data = mysqli_query($conn,$query) or die("Gagal query:".$query);
		    ?>
		    <?php while ($v=mysqli_fetch_array($data)):;?>
		    <tr>
		      <td><?php echo $v["id"];?></td>
		      <td><?php echo $v["nama_menu"];?></td>
		      <td><?php echo $v["harga"];?></td>
		      <td><a href="hapus.php?id=<?php echo $v['id'];?>" class="btn btn-danger" >Hapus</a>&nbsp; <a href="edit.php?id=<?php echo $v['id'];?>" class="btn btn-success" >Edit</a></td>
		    </tr>
		  <?php endwhile;?>
		</tbody>
	</table>
 </div>
</body>
</html>