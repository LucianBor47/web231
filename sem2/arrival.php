<?php
    $distance = $_GET['distance'];
    $speed = $_GET['speed'];
    $time = 0;
    if ($_GET && is_numeric($_GET['distance']) && is_numeric($_GET['speed'])) {
        $time = ($distance / $speed);
    } else {
        echo '<div id="error"><p>Please enter a number.</p></div>';
    }
?>
<html>
<head>
    <title>Seminar 2 Lab</title>

    <meta charset="utf-8" />
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style>
        html {
            background: gray; 
        }
        div {
            text-align: center; 
            background: gray;
            font-family: Helvetica;
        }
        input {
            text-align: right;
        }
        #error {
            color: red;
        }
    </style>
</head>
<body>
    <div>
        <h1>Seminar 2 Lab 3</h1>
        <h3>Lucian Bor</h3>
    </div> 
    <div>
    <p>The amount of time it will take you to travel <?php echo $distance ?> miles at <?php echo $speed ?> miles per hour is:</p>
        <p><?php echo round($time,2)." rounded to two decimals."?> hours</p>
        <p><?php echo round($time,3)." rounded to three decimals."?> hours</p>
    </div>
</body>
</html>


