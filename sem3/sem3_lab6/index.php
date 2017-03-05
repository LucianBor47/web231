<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>View My Blog</title>
        <link rel='stylesheet' href='/web231/style/main.css'>
</head>
<body>
<h1>My Blog</h1>
<?php // Script 12.7 - view_entries.php 
/* This script retrieves blog entries from the database. */

// Connect and select:
$dbc = mysqli_connect('localhost', 'testUser', 'TestPass!2');
mysqli_select_db($dbc, 'myblog');
	
// Define the query:
$query = 'SELECT * FROM entries ORDER BY date_entered DESC';
	
if ($r = mysqli_query($dbc, $query)) { // Run the query.

	// Retrieve and print every record:
	while ($row = mysqli_fetch_array($r)) {
		print "<p><h3>{$row['title']}</h3>
		{$row['entry']}<br />
		<a class='links' href=\"edit_entry.php?id={$row['entry_id']}\">Edit</a>
		<a class='links' href=\"delete_entry.php?id={$row['entry_id']}\">Delete</a>
		</p><hr />\n";
	}

} else { // Query didn't run.
	print '<p style="color: red;">Could not retrieve the data because:<br />' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
} // End of query IF.

mysqli_close($dbc); // Close the connection.

?>
</body>
</html>
