<?php

$check = new SessionController();
$check->restricLogin();

    $weeknumber = date("W");
    

    echo '<div class="container-fluid">'
    .	    '<div class="col-sm-8">'
	    . '<h2>Current week of year planning is: <strong>'.$weeknumber.'</strong></h2>';

        $str = '2016W'.$weeknumber;

        echo " <br/><p>Monday from current Weeknumber : ".date("M d", strtotime($str))."</p>";
        echo " <p>Sunday from current Weeknumber : ".date("M d", strtotime($str.' + 6 days'))."</p></div>";

        // For tests purposes, delete on client reception
        echo "<div class='col-sm-4' style='text-align:center'>"
	.	"<br/><a href='index.php?p=newsletter'><button class='btn btn-block btn-primary pull-right' type='button'>Test Newsletter</button></a><br/>";

        echo "<br/><a href='index.php?p=reservation'><button class='btn btn-block btn-primary pull-right' type='button'>Make a Reservation</button></a><br/>";
	
	
	echo "<br/><a href='index.php?p=contact'><button class='btn btn-block btn-primary pull-right' type='button'>Contact Us</button></a><br/>"
	."</div></div>";
?>