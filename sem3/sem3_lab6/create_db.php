<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Create the Database</title>
</head>
<body>
<?php // Script 12.3 - create_db.php
/* This script connects to the MySQL server. It also creates and selects the database. */

// Attempt to connect to MySQL and print out messages:
if ($dbc = @mysqli_connect('localhost', 'testUser', 'TestPass!2')) {
	
	print '<p>Successfully connected to MySQL!</p>';
	
	// Try to create the database:
	if (@mysqli_query($dbc, 'CREATE DATABASE myblog')) {
		print '<p>The database has been created!</p>';
	} else { // Could not create it.
		print '<p style="color: red;">Could not create the database because:<br />' . mysqli_error($dbc) . '.</p>';
	}
	
	// Try to select the database:
	if (@mysqli_select_db($dbc, 'myblog')) {
		print '<p>The database has been selected!</p>';
	} else {
		print '<p style="color: red;">Could not select the database because:<br />' . mysqli_error($dbc) . '.</p>';
	}
	
	mysqli_close($dbc); // Close the connection.

} else {
	print '<p style="color: red;">Could not connect to MySQL:<br />' . mysqli_connect_error() . '.</p>';

}

?>
</body>
</html>
