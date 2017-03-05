<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Edit a Blog Entry</title>
        <link rel='stylesheet' href='/web231/style/main.css'>
</head>
<body>
<h1>Edit an Entry</h1>
<?php // Script 12.9 - edit_entry.php 
/* This script edits a blog entry using an UPDATE query. */

// Connect and select:
$dbc = mysqli_connect('localhost', 'testUser', 'TestPass!2');
mysqli_select_db($dbc, 'myblog');

if (isset($_GET['id']) && is_numeric($_GET['id']) ) { // Display the entry in a form:

	// Define the query.
	$query = "SELECT title, entry FROM entries WHERE entry_id={$_GET['id']}";
	if ($r = mysqli_query($dbc, $query)) { // Run the query.
	
		$row = mysqli_fetch_array($r); // Retrieve the information.
		
		// Make the form:
		print '<form action="edit_entry.php" method="post">
	<p>Entry Title:<br> <input type="text" name="title" size="40" maxsize="100" value="' . htmlentities($row['title']) . '" /></p>
	<p>Entry Text:<br> <textarea name="entry" cols="90" rows="25">' . htmlentities($row['entry']) . '</textarea></p>
	<input type="hidden" name="id" value="' . $_GET['id'] . '" />
	<input type="submit" name="submit" value="Update this Entry!" />
	</form>';

	} else { // Couldn't get the information.
		print '<p style="color: red;">Could not retrieve the blog entry because:<br />' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
	}

} elseif (isset($_POST['id']) && is_numeric($_POST['id'])) { // Handle the form.

	// Validate and secure the form data:
	$problem = FALSE;
	if (!empty($_POST['title']) && !empty($_POST['entry'])) {
		$title = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['title'])));
		$entry = mysqli_real_escape_string($dbc, trim(strip_tags($_POST['entry'])));
	} else {
		print '<p style="color: red;">Please submit both a title and an entry.</p>';
		$problem = TRUE;
	}

	if (!$problem) {

		// Define the query.
		$query = "UPDATE entries SET title='$title', entry='$entry' WHERE entry_id={$_POST['id']}";
		$r = mysqli_query($dbc, $query); // Execute the query.
		
		// Report on the result:
		if (mysqli_affected_rows($dbc) == 1) {
			print '<p>The blog entry has been updated. <a href="index.php">Click here to return.</a></p>';
		} else {
			print '<p style="color: red;">Could not update the entry because:<br />' . mysqli_error($dbc) . '.</p><p>The query being run was: ' . $query . '</p>';
		}
		
	} // No problem!

} else { // No ID set.
	print '<p style="color: red;">This page has been accessed in error.</p>';
} // End of main IF.

mysqli_close($dbc); // Close the connection.

?>
</body>
</html>
