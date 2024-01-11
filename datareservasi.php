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
 	<table class="table table-striped">
  		<thead>
		    <tr>
		      <th scope="col">Id </th>
		      <th scope="col">Nama</th>
		      <th scope="col">Email</th>
		      <th scope="col">Waktu</th>
		      <th scope="col">Jumlah Orang</th>
		      <th scope="col">Note</th>
		    </tr>
		</thead>
		<tbody>
		    <?php 
		      $query = "SELECT reservasi.id, reservasi.email, reservasi.waktu, reservasi.jumlah_orang, reservasi.note, member.username
              FROM reservasi
              INNER JOIN member ON reservasi.member_id = member.id
              ORDER BY reservasi.id ASC";
		      $data = mysqli_query($conn,$query) or die("Gagal query:".$query);
		    ?>
		    <?php while ($v=mysqli_fetch_array($data)):;?>
		    <tr>
		        <td><?php echo $v["id"];?></td>
		        <td><?php echo $v["username"];?></td>
		        <td><?php echo $v["email"];?></td>
		        <td><?php echo $v["waktu"];?></td>
		        <td><?php echo $v["jumlah_orang"];?></td>
		        <td><?php echo $v["note"];?></td>
		    </tr>
		  <?php endwhile;?>
		</tbody>
	</table>
 </div>
</body>
</html>