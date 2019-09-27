<?php
	session_start();
	$ses_user=$_SESSION['login_user'];
	$ses_ulevel=$_SESSION['user_level'];
	$ses_ukey=$_SESSION['user_keye'];
	$ses_dep=$_SESSION['dep'];
	$ses_commit=$_SESSION['committ'];

	
	if(!isset($_SESSION['login_user'])|| !isset($_SESSION['user_level'])){
		header("location:index.php");
	}
?>
