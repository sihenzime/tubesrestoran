<?php

require ("function.php");

if ( isset($_POST["register"])) {
  
  if (registrasi($_POST) > 0 ) {
    echo "<script>
            alert('admin baru berhasil ditambahkan!, silahkan login')
          </script>" ;
  } else {

    echo mysqli_error($conn);
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Registrasi Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="css/style.css">
    <style>
    body {
  background-color: #f2f2f2;
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.login-container {
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  margin: 100px auto;
  max-width: 300px;
  padding: 20px;
}

h2 {
  text-align: center;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
  margin-bottom: 5px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  padding: 10px;
  width: 100%;
}

button {
  background-color: #4CAF50;
  border: none;
  border-radius: 4px;
  color: #fff;
  cursor: pointer;
  font-size: 16px;
  padding: 10px;
  width: 100%;
}

button:hover {
  background-color: #45a049;
}

  </style>
  </head>
  <body>
    <div class="login-container">
    <h2>Daftar Admin</h2>
    <form method="POST">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Username" required>
      </div>
      <div class="form-group">
        <label for="username">Email:</label>
        <input type="email" id="email" name="email" placeholder="Email"  required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Password" required>
      </div>
      <div class="form-group">
        <label for="password">Konfirmasi Password:</label>
        <input id="password-field" type="password" name="password2" placeholder="Konfirmasi Password" class="form-control" required>
      </div>
      <button type="submit" name="register">Daftar</button>
      <a href="adminsignin.php">Login akun</a>
    </form>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>