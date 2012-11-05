<?php
$blogs_per_page = 5;

# Get the current page number.
if (!isset($_GET["pn"]) || empty($_GET["pn"])) {
	$page_number = 1;
} else {
	$page_number = $_GET["pn"];
}

$result = mysql_query("SELECT COUNT(*) FROM Blog");
$count = mysql_fetch_assoc($result);
$count = $count['COUNT(*)'];
$max_pages = ceil($count / 5.0);
$next_page = $page_number + 1;

$start_Id = $count - ($page_number - 1) * $blogs_per_page;
$end_Id = $start_Id - $blogs_per_page + 1;
if ($end_Id < 1) {
	$end_Id = 1;
}

# Display the blogs that should appear on the current page.
$result = mysql_query("SELECT * FROM Blog WHERE Blog_Id <= " . $start_Id . " AND Blog_Id >= " . $end_Id . " ORDER BY Blog_Id DESC");

while ($row = mysql_fetch_array($result)) {
	echo '
	<p>
	<b>Title:</b> ' . $row['Title']. '<br>' .
	$row['Content'] . '<br>' .
	'<i>' . $row['Date'] . ' by ' . $row['Author'] . '</i>' .
	'</p>';
	echo '<hr>';
}

# Display at most 7 pages centering the current page.
$start_page = $page_number - 3 < 1 ? 1 : $page_number - 3;

if ($start_page + 6 <= $max_pages) {
	$end_page = $start_page + 6;
} else {
	$end_page = $max_pages;
	
	$leftover = $start_page + 6 - $max_pages;
	$start_page -= $leftover;
	if ($start_page < 1) {
		$start_page = 1;
	}
}

echo '<ul><li>';
# Display first and previous pages only if not the first page.
if ($page_number != 1) {
	echo '<a id="page_item" href="../blog.php?pn=1">First Page</a>';
	echo '<a id="page_item" href="../blog.php?pn=1">Previous</a>';
}

for ($i = $start_page; $i <= $end_page; $i++) {
	if ($i == $page_number) {
		echo $i;
	} else {
		echo '<a id="page_item" href="../blog.php?pn=' . $i . '">' . $i . '</a>';
	}
}

# Display next and last pages only if not the last page.
if ($page_number != $max_pages) {
	echo '<a id="page_item" href="../blog.php?pn=' . $next_page . '">Next</a>';
	echo '<a id="page_item" href="../blog.php?pn=' . $max_pages . '">Last Page</a>';
}

echo '</li></ul>';
echo '<hr>';
?>