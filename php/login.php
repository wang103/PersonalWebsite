<?php
# Start session
session_start();

$con = mysql_connect('50.63.108.129', 'TianyiBlog', 'Progr001!');
if (!$con) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("TianyiBlog", $con);

# Escape special characters.
if(!get_magic_quotes_gpc()) {
	$user = mysql_real_escape_string($_POST['user']);
} else {
	$user = $_POST['user'];
}

# Check against the DB.
$qry = "SELECT UserName,IsAdmin FROM User WHERE UserName='" . $user . "' AND Password='" . md5($_POST['pwd']) . "'";
$login_result = mysql_query($qry);

# Store authentication in session.
if(mysql_num_rows($login_result) > 0) {
	# Regenerate session ID to prevent session fixation attacks
    session_regenerate_id();

	# Login Successful.
    $member = mysql_fetch_assoc($login_result);
    
	$_SESSION['USER_NAME'] = $member['UserName'];
	$_SESSION['IS_ADMIN'] = $member['IsAdmin'];
    
	# Write session to disc
    session_write_close();
	
    header("location: ../blog.php");
    exit();
} else {
	# Login failed
	header("location: login_failed.php");
	exit();
}

mysql_close($con);
?>