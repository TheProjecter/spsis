<?php
	include 'connection.php';
	include 'sessions.inc';
	
	$uname = $_GET['name'];
	$query = "SELECT * FROM machine WHERE name='$uname'";
	$result = mysql_query($query);
	echo "<p><span id='bitPageTitle'>Machine Spare Parts</span></p>";
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		echo "Machine Name: {$row['name']} <br />";
	}
	
	echo "Spare Parts: <br /><p><table id='insideFrameHalf'>";
	
	$query = "SELECT * FROM item WHERE machine='$uname'";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
		echo "<tr><td>{$row['mat_no']}</td></tr>";
	}
	echo "</table></p>";
?>