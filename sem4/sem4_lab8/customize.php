<?php // Script 9.3 - customize.php #2

// Handle the form if it has been submitted:
if (isset($_POST['font_size'], $_POST['font_color'])) {
	
	// Send the cookies:
	setcookie('font_size', $_POST['font_size'], time()+10000000, '/');
	setcookie('font_color', $_POST['font_color'], time()+10000000, '/');
        //$msg2 = 'Font size is: '. $_POST['font_size'] . '<br>Font color: ' . $_POST['font_color'];
	// Message to be printed later:
	$msg = '<p>Your settings have been entered! Click <a href="view_settings.php">here</a> to see them in action.</p>';
	
} // End of submitted IF.
if (isset($_POST['font_size'])) {
    $font_size = $_POST['font_size'];
} elseif (isset($_COOKIE['font_size'])) {
    $font_size = $_COOKIE['font_size'];
} else {
   $font_size = ''; 
}
if (isset($_POST['font_color'])) {
    $font_color = $_POST['font_color'];
} elseif (isset($_COOKIE['font_color'])) {
    $font_color = $_COOKIE['font_color'];
} else {
    $font_color = '';
}

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Customize Your Settings</title>
        <style>
            body {
            font-size: <?php echo $font_size ?>; 
            color: <?php echo '#'.$font_color ?>;
            }
        </style>
</head>

<body>
<?php // If the cookies were sent, print a message.
if (isset($msg)) {
	print $msg;
        //echo $msg2;
}
?>

<p>Use this form to set your preferences:</p>

<form action="customize.php" method="post">
	<select name="font_size">
        <option value=""<?php if($font_size =="") echo 'selected="selected"'; ?>>Font Size</option>
        <option value="xx-small"<?php if($font_size =="xx-small") echo 'selected="selected"'; ?>>xx-small</option>
	<option value="x-small"<?php if($font_size =="x-small") echo 'selected="selected"'; ?>>x-small</option>
	<option value="small"<?php if($font_size =="small") echo 'selected="selected"'; ?>>small</option>
	<option value="medium"<?php if($font_size =="medium") echo 'selected="selected"'; ?>>medium</option>
	<option value="large"<?php if($font_size =="large") echo 'selected="selected"'; ?>>large</option>
	<option value="x-large"<?php if($font_size =="x-large") echo 'selected="selected"'; ?>>x-large</option>
	<option value="xx-large"<?php if($font_size =="xx-large") echo 'selected="selected"'; ?>>xx-large</option>
	</select>
	<select name="font_color">
	<option value=""<?php if($font_color =="") echo 'selected="selected"'; ?>>Font Color</option>
	<option value="999"<?php if($font_color =="999") echo 'selected="selected"'; ?>>Gray</option>
	<option value="0c0"<?php if($font_color =="0c0") echo 'selected="selected"'; ?>>Green</option>
	<option value="00f"<?php if($font_color =="00f") echo 'selected="selected"'; ?>>Blue</option>
	<option value="c00"<?php if($font_color =="c00") echo 'selected="selected"'; ?>>Red</option>
	<option value="000"<?php if($font_color =="000") echo 'selected="selected"'; ?>>Black</option>
	</select>
	<input type="submit" name="submit" value="Set My Preferences" />
</form>

</body>
</html>
