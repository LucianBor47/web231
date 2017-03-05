<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Delete a Blog Entry</title>
        <link rel='stylesheet' href='/web231/style/main.css'>
</head>
<body>
<h1>Delete an Entry</h1>
<?php // Script 12.8 - delete_entry.php 
/* This script deletes a blog entry. */

// Connect and select:
$dbc = mysqli_connect('localhost', 'testUser', 'TestPass!2');
mysqli_select_db($dbc, 'myblog');
	
if (isset($_GET['id']) && is_numeric($_GET['id']) ) { // Display the entry in a form:

	// Define the query:
	$query = "SELECT title, entry FROM entries WHERE entry_id={$_GET['id']}";
	if ($r = mysqli_query($dbc, $query)) { // Run the query.
	
		$row = mysqli_fetch_array($r); // Retrieve the information.

		// Make the form:
		print '<form action="delete_entry.php" method="post">
		<p>Are you sure you want to delete this entry? If not click <a href="index.php">here</a>.</p>
		<p><h3>' . $row['title'] . '</h3>' .
		$row['entry'] . '<br />
		<input type="hidden" name="id" value="' . $_GET['id'] . '" />
		<input type="submit" name="submit" value="Delete this Entry!" /></p>
		</form>';

	} else { // Couldn't get the information.
		print '<p style="color: red;">Could not retrieve the blog entry because:<br />' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}

} elseif (isset($_POST['id']) && is_numeric($_POST['id'])) { // Handle the form.
	
	// Define the query:
	$query = "DELETE FROM entries WHERE entry_id={$_POST['id']} LIMIT 1";
	$r = mysqli_query($dbc, $query); // Execute the query.
	
	// Report on the result:
	if (mysqli_affected_rows($dbc) == 1) {
		print '<p>The blog entry has been deleted.</p>';
	} else {
		print '<p style="color: red;">Could not delete the blog entry because:<br />' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}

} else { // No ID received.
	print '<p style="color: red;">This page has been accessed in error.</p>';
} // End of main IF.

mysqli_close($dbc); // Close the connection.

?>
</body>
</html>
