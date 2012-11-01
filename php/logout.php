<?php
	session_start();
	
	# Unset the variables stored in session.
	unset($_SESSION['USER_NAME']);
	unset($_SESSION['IS_ADMIN']);
	
	header("location: ../blog.php");
    exit();
?>