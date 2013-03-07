<?php
    session_save_path('/home/content/49/10017049/html/tmp/sessions');
    session_start();

	# Unset the variables stored in session.
	unset($_SESSION['USER_NAME']);
	unset($_SESSION['IS_ADMIN']);

	header("location: ../blog.php");
	die();
?>
