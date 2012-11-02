<?php
echo "<p>Blog is coming soon</p>";

# Get the current page number.
if (!isset($_GET["pn"]) || empty($_GET["pn"])) {
	$page_number = 1;
} else {
	$page_number = $_GET["pn"];
}

# Display the blogs that should appear on the current page.


# Display at most 7 pages centering the current page.

?>