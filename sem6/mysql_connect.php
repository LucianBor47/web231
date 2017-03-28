<?php // Script 13.1 - mysql_connect.php
/* This script connects to and selects the database. */

// Connect:
$dbc = mysqli_connect('localhost', 'testUser', 'TestPass!');

// Select:
mysqli_select_db($dbc, 'myquotes');

?>