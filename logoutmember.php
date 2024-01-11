<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

unset($_SESSION["loginmember"]);
unset($_SESSION["usernamemember"]);
unset($_SESSION["emailmember"]);
unset($_SESSION["idmember"]);

header("Location: membersignin.php");
exit;
?>