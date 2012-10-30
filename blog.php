<!DOCTYPE html>
<html>

<head>
<title>Tianyi Wang's Homepage</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
<div id="container">

<h1>
Tianyi Wang's Homepage
</h1>

<!--Navigation Bar-->
<ul>
<li><a id="nav_item" href="index.html">HOME</a></li>
<li><a id="nav_item" href="contacts.html">CONTACTS</a></li>
<li><a id="nav_item" href="resume.html">RESUME</a></li>
<li><a id="nav_item" href="blog.php">MY BLOG</a></li>
</ul>

<br>

<div id="blog_left">
<?php include 'php/load_blog.php'; ?>
</div>

<div id="blog_right">
<form name="login_form" action="php/actions.php" method="get">
<p id="login_p"><label id="login_label">User: </label> <input id="login_input" type="text" name="user" required></p>
<p id="login_p"><label id="login_label">Password:</label> <input id="login_input" type="password" name="pwd" required></p>
<p id="login_p" align="center"><input type="submit" value="Submit"></p>
</form>
</div>

<!--Footer-->
<br>
<br>
<div id="footer">
&copy; 2012 Tianyi Wang
</div>

</div>
</body>

</html>