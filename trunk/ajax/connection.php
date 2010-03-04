<?php
	$con = mysql_connect("localhost","mentak","mentak");
	if (!$con){
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db("spsis", $con);
?>