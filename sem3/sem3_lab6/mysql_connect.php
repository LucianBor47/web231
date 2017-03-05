<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Connect to MySQL</title>
</head>
<body>
<?php // Script 12.2 - mysql_connect.php #2
/* This script connects to the MySQL server. */

// Attempt to connect to MySQL and print out messages:
if ($dbc = @mysqli_connect('localhost', 'testUser', 'TestPass!')) {
	
	print '<p>Successfully connected to MySQL!</p>';
	
	mysqli_close($dbc); // Close the connection.

} else {

	print '<p style="color: red;">Could not connect to MySQL:<br />' . mysqli_connect_error() . '.</p>';

}

?>
</body>
</html>
