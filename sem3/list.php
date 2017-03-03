<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>I Have This Sorted Out</title>
        <link rel='stylesheet' href='/web231/style/main.css'>
</head>
<body>
<?php // Script 7.7 - list.php
/* This script receives a string in $_POST['words']. It then turns it into an array,
sorts the array alphabetically, and reprints it. */

// Address error management, if you want.
if ($_POST['words']) {
    // Turn the incoming string into an array:
    $words_array = explode(' ' , $_POST['words']);

    // Sort the array:
    sort($words_array);

    // Turn the array back into a string:
    //$string_words = implode('<br />', $words_array);

    // Print the results:
    print "<h3>An alphabetized version of your list is: </h3>";

    foreach ($words_array as $words) {
        echo '<p>'.$words.'</p>';
    }
} else {
    echo '<h3>Please enter a string value. <a href="index.html">Go back.</h3>';
}
?>
</body>
</html>
