<?php
	session_start();
	$_SESSION = [];
	session_destroy();
	session_unset();
	echo "<script>alert('Anda Sudah Logout');</script>";
	//header("Location: login.php");
	echo "<script>location='login.php';</script>";
 ?>
