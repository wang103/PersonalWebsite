<?php
$con = mysql_connect('50.63.108.129', 'TianyiBlog', 'Progr001!');
if (!$con) {
	die('Could not connect: ' . mysql_error());
}
mysql_select_db("TianyiBlog", $con);

# Insert new blog into the DB.
$sql = "INSERT INTO Blog (Title, Content, Date, Author)
VALUES
('$_POST[title]', '$_POST[content]', NULL, NULL)";

if (!mysql_query($sql, $con)) {
	die('Error: ' . mysql_error());
}
echo "Blog added";

mysql_close($con);
?>