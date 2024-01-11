<?php
session_start();

if ( isset($_SESSION["loginmember"]) ) {
  header("Location: index.php");
  exit;
}
require ("function.php");

if (isset($_POST['login'])) {
  
  $email = $_POST["email"];
  $password = $_POST["password"];

  $sql = "SELECT * FROM member WHERE email = '$email'";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result)  == 1 ) {
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row["password"]) ) {

            $_SESSION["loginmember"] = true;
            $_SESSION["usernamemember"] = $row["username"];
            $_SESSION["emailmember"] = $row["email"];
            $_SESSION["idmember"] = $row["id"];
        header("Location: index.php");
        exit;
      }
    }

    $error = true;
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Form Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
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
    <h2>Login Member</h2>
    <form method="POST">
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="email" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" placeholder="Password" required>
      </div>
      <button type="submit" name="login">Login</button>
      <a href="membersignup.php">buat akun</a>
    </form>
  </div>
</body>
</html>
