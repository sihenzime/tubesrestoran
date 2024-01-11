<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

unset($_SESSION["login"]);
unset($_SESSION["username"]);
unset($_SESSION["email"]);
unset($_SESSION["id"]);

header("Location: adminsignin.php");
exit;
?>