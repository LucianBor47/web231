<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Create a Table</title>
</head>
<body>
<?php // Script 12.4 - create_table.php 
/* This script connects to the MySQL server, selects the database, and creates a table. */

// Connect and select:
if ($dbc = @mysqli_connect('localhost', 'testUser', 'TestPass!2')) {
	
	// Handle the error if the database couldn't be selected:
	if (!@mysqli_select_db($dbc, 'myblog')) {
		print '<p style="color: red;">Could not select the database because:<br />' . mysqli_error($dbc) . '.</p>';
		mysqli_close($dbc);
		$dbc = FALSE;
	}

} else { // Connection failure.
	print '<p style="color: red;">Could not connect to MySQL:<br />' . mysqli_error() . '.</p>';
}

if ($dbc) {

	// Define the query:
	$query = 'CREATE TABLE entries (
entry_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(100) NOT NULL,
entry TEXT NOT NULL,
date_entered DATETIME NOT NULL
)';
	
	// Execute the query:
	if (@mysqli_query($dbc, $query)) {
		print '<p>The table has been created!</p>';
	} else {
		print '<p style="color: red;">Could not create the table because:<br />' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}
		
	mysqli_close($dbc); // Close the connection.

}
?>
</body>
</html>
