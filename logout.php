<?php 
SESSION_START();
include 'db.php';
unset($_SESSION["c_id"]);
unset($_SESSION["c_username"]);
SESSION_DESTROY();
header("Location:login.php");
?>