<?php
session_start();
unset($_SESSION['uid']);
header("location:login.php");
?>
